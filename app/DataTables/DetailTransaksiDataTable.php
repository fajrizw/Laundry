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
          
            })->editColumn("kode_invoice", function($query) {
                return $query->transaksi->kode_invoice;

            })->filterColumn("kode_invoice", function($query, $keyword) {
                // idk
                $query->where("id_transaksi", \App\Models\Transaksi::where("kode_invoice", "LIKE", "%".$keyword."%")->first()->id ?? 0);
            })->orderColumn("kode_invoice", false)

            ->editColumn("tgl_pemesanan", function($query) {
                return $query->transaksi->tgl;

            })->filterColumn("tgl_pemesanan", function($query, $keyword) {
                // idk
                $query->where("id_transaksi", \App\Models\Transaksi::where("tgl", "LIKE", "%".$keyword."%")->first()->id ?? 0);
            })->orderColumn("tgl_pemesanan", false)
            
            ->editColumn("tgl_pembayaran", function($query) {
                return $query->transaksi->tgl_bayar;

            })->filterColumn("tgl_pembayaran", function($query, $keyword) {
                // idk
                $query->where("id_transaksi", \App\Models\Transaksi::where("tgl_bayar", "LIKE", "%".$keyword."%")->first()->id ?? 0);
            })->orderColumn("tgl_pembayaran", false)
            
            ->editColumn("status_pemesanan", function($query) {
                return $query->transaksi->status_pemesanan;

            })->filterColumn("status_pemesanan", function($query, $keyword) {
                // idk
                $query->where("id_transaksi", \App\Models\Transaksi::where("status_pemesanan", "LIKE", "%".$keyword."%")->first()->id ?? 0);
            })->orderColumn("status_pemesanan", false)


              ->editColumn("nama_paket", function($query) {
                return $query->paket->nama_paket;

            })->filterColumn("nama_paket", function($query, $keyword) {
                // idk
                $query->where("id_paket", \App\Models\Paket::where("nama_paket", "LIKE", "%".$keyword."%")->first()->id ?? 0);
            })->orderColumn("nama_paket", false)
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
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload'),
                        Button::make('add')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('kode_invoice'),
            Column::make('tgl_pemesanan'),
            Column::make('tgl_pembayaran'),
            Column::make('status_pemesanan'),
            Column::make('nama_paket'),
            Column::make('qty'),
            Column::make('keterangan'),
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
