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
            $route = route("detail_transaksi.edit", $query->id);
            $destroy = route("detail_transaksi.destroy", $query->id);
            $csrf = csrf_token();

            return <<<html
            <div>
            <div class="modal fade" id="deleteModal$query->id" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Transaksi</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        Apakah kamu yakin ingin menghapus transaksi?
                        </div>
                        <div class="modal-footer">
                        <form action="$destroy" method="POST">
                            <input type="hidden" value="$csrf" name="_token">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                    </div>
                </div>
                <div class='d-flex'>
                    <a class='btn btn-dark me-2' href='$route'> <i class='fas fa-edit'></i></a>
                    <button class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteModal$query->id'> <i class='fas fa-trash'></i> </button>
                </div>
            </div>
            html;

            })->editColumn("kode_invoice", function($query) {
                return $query->transaksi->kode_invoice;

            })->filterColumn("kode_invoice", function($query, $keyword) {
                // idk
                $query->where("id_transaksi", \App\Models\Transaksi::where("kode_invoice", "LIKE", "%".$keyword."%")->first()->id ?? 0);
            })->orderColumn("kode_invoice", false)

            ->editColumn("tgl", function($query) {
                return $query->transaksi->kode_invoice;

            })->filterColumn("tgl", function($query, $keyword) {
                // idk
                $query->where("id_transaksi", \App\Models\Transaksi::where("tgl", "LIKE", "%".$keyword."%")->first()->id ?? 0);
            })->orderColumn("tgl", false)
            
            ->editColumn("tgl_bayar", function($query) {
                return $query->transaksi->kode_invoice;

            })->filterColumn("tgl_bayar", function($query, $keyword) {
                // idk
                $query->where("id_transaksi", \App\Models\Transaksi::where("tgl_bayar", "LIKE", "%".$keyword."%")->first()->id ?? 0);
            })->orderColumn("tgl_bayar", false)
            
            ->editColumn("status_pembayaran", function($query) {
                return $query->transaksi->kode_invoice;

            })->filterColumn("status_pembayaran", function($query, $keyword) {
                // idk
                $query->where("id_transaksi", \App\Models\Transaksi::where("status_pembayaran", "LIKE", "%".$keyword."%")->first()->id ?? 0);
            })->orderColumn("status_pembayaran", false)


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
                    ->minifiedAjax( route('transaksi.det'))
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
                        Button::make('add'),
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('Kode Invoice'),
            Column::make('Tgl Pemesanan'),
            Column::make('Tgl Pembayaran'),
            Column::make('Status Pembayaran'),
            Column::make('Nama Paket'),
            Column::make('Qty'),
            Column::make('Keterangan'),
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
