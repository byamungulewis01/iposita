<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class BranchTopupExport implements FromCollection,WithTitle,WithHeadings,WithEvents,ShouldAutoSize
{
    use Exportable;

    protected $query;

    public function __construct($query, $title="Branch Top-ups")
    {
        $this->query = $query;
        $this->title = $title;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //
        $agents=$this->query->get();

        return $agents->map(
            function ($item) {
                $row=array();
                $row[] =optional($item->serviceProvider)->name??'-';
                $row[] = optional($item->service)->name??'-';
                $row[] = number_format($item->previous_amount);
                $row[] = number_format($item->topup_amount);
                $row[] = number_format($item->current_amount);
                $row[]=$item->description ?? '-';
                $row[]=$item->status;
                $row[]= optional($item->created_at)->format('Y-m-d h:m:s');
                return $row;
            }
        );
    }


    public function title(): string
    {
        return 'Top-ups';
    }


    public function headings(): array
    {
        return [
            'Service Provider',
            'Service',
            'Previous Amount',
            'Top-up Amount',
            'Current Amount',
            'Comment',
            'Status',
            'Created At',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $last_column = Coordinate::stringFromColumnIndex(8);
                $style_text_center = [
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER
                    ],
                    'font'=>[
                        'size' => '16'
                    ]
                ];
                $event->sheet->insertNewRowBefore(1);
                // merge cells for full-width
                $event->sheet->mergeCells(sprintf('A1:%s1',$last_column));
                // assign cell values
                $event->sheet->setCellValue('A1',$this->title);
                // assign cell styles
                $event->sheet->getStyle('A1:A2')->applyFromArray($style_text_center);
                $cellRange = sprintf('A2:%s2',$last_column); // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
                $event->sheet->getDelegate()->getStyle(sprintf('A1:%s1',$last_column))->getFont()->setSize(14);

            },
        ];
    }


}
