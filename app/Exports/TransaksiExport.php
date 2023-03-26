<?php

namespace App\Exports;

use App\Models\Transaksi;
use App\Models\Member;
use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Facades\DB;
class TransaksiExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    protected $trans;

    public function __construct($trans)
    {
        $this->trans = $trans;
    }
    public function collection()
    {
          // Get the initial dataset
    $data = Transaksi::select('transaksi.id', 'transaksi.kode_invoice',  'member.nama','users.name','transaksi.status_pemesanan', 'transaksi.status_pembayaran')
    ->leftJoin('member', 'transaksi.id_member', '=', 'member.id')
    ->leftJoin('users', 'transaksi.id_user', '=', 'users.id')
    ->get();

    // Process the data (e.g. filter, sort, or transform)
    $processedData = $this->processData($data);

    // Return the processed dataset
    return $processedData;

    }
    

public function processData($data)
{
   
    foreach ($data as $item) {
        // Call the stored procedure and pass the member ID and transaksi ID as parameters
        $result = DB::select('CALL transaksi_penggunaBaru(?)', [$item->id]);

    

        // Check if the result array has any rows before accessing index 0
    if (!empty($result)) {
              // (in this case, it should contain a single row with a single column)
        $transaksi_pertama = $result[0]->transaksi_pertama;
        $item->transaksi_pertama = $transaksi_pertama;
    } else {
        $item->transaksi_pertama = null; 
    }
    }

    // Return the modified dataset
    return $data;
}

        // return DB::select('CALL transaksi_penggunaBaru(?, ?)', [$member->id, $transaksi->id]);
        // return Transaksi::select('transaksi.*', 'member.nama', 'users.name', 'outlet.nama_outlet')
        // ->leftJoin('member', 'transaksi.id', '=', 'member.id_transaksi')
        // ->leftJoin('users', 'transaksi.id', '=', 'users.id_transaksi')
        // ->leftJoin('outlet', 'transaksi.id', '=', 'outlet.id_transaksi')
        // ->get();
    
    public function headings(): array
    {
        return [
            'ID',
            'Invoice',
            'Member',
            'Kasir',
            'Status Pemesanan',
            'Status Pembayaran',
            'Total',
          
        ];
    }
    
    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ],
        ];
    }
}
