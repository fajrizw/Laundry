<?php

namespace App\DataTables;

use App\Models\DetailTransaksi;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DetailTransaksiDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', function($query) {

            })->editColumn("nama_paket", function($query) {
                return $query->paket->nama_paket;

            })->filterColumn("nama_paket", function($query, $keyword) {
                // idk
                $query->where("id_paket", \App\Models\Paket::where("nama_paket", "LIKE", "%".$keyword."%")->first()->id ?? 0);
            })->orderColumn("nama_paket", false)

               ->editColumn("harga", function($query) {
                return "Rp. " . $query->paket->harga;

            })->filterColumn("harga", function($query, $keyword) {
                // idk
                $query->where("id_paket", \App\Models\Paket::where("harga", "LIKE", "%".$keyword."%")->first()->id ?? 0);
            })->orderColumn("harga", false)

            ->editColumn("biaya_admin", function($query) {
                return "Rp. " . $query->transaksi->outlet->biaya_admin;

            })->filterColumn("biaya_admin", function($query, $keyword) {
                // idk
                $query->where("id_outlet", \App\Models\Outlet::where("biaya_admin", "LIKE", "%".$keyword."%")->first()->id ?? 0);
            })->orderColumn("biaya_admin", false)

            ->editColumn("diskon", function($query) {
                return  $query->transaksi->voucher->diskon."%";

            })->filterColumn("diskon", function($query, $keyword) {
                // idk
                $query->where("id_voucher", \App\Models\Voucher::where("diskon", "LIKE", "%".$keyword."%")->first()->id ?? 0);
            })->orderColumn("diskon", false)

            // ->editColumn("total", function($query) {
            //     return  $query->voucher->diskon."%";

            // })->filterColumn("total", function($query, $keyword) {
            //     // idk
            //     $query->where("id_voucher", \App\Models\Voucher::where("total", "LIKE", "%".$keyword."%")->first()->id ?? 0);
            // })->orderColumn("total", false)
            ->setRowId('id');





    }

    /**
     * Get the query source of dataTable.
     */
    public function query(DetailTransaksi $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('detailtransaksi-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('<"row align-items-center"<"col-md-2" l><"col-md-6" B><"col-md-4"f>><"table-responsive my-3" rt><"row align-items-center" <"col-md-6" i><"col-md-6" p>><"clear">')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([


                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('keterangan'),
            Column::make('nama_paket'),
            Column::make('harga'),
            Column::make('qty'),
            Column::make('biaya_admin'),
            Column::make('diskon'),
            // Column::make('total'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'DetailTransaksi_' . date('YmdHis');
    }
}
