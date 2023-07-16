<?php

namespace App\DataTables;

use App\Models\KibE;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class KibEDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    protected string $dataTableVariable = 'dataTableKIBE';
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'kibe.action')
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(KibE $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('kibe-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('')->data('selection')->orderable(false),
            Column::make('Kode Barang')->data('Kd_Barang')->orderable(false),
            Column::make('Nama Aset')->data('Nm_Aset5')->orderable(false),
            Column::make('Tgl Perolehan')->data('Tgl_Perolehan')->orderable(false),
            Column::make('Kondisi')->data('Kondisi')->orderable(false),
            Column::make('Last Update')->data('Tgl_Perolehan')->orderable(false),
            Column::computed('Action')->data('action')->orderable(false),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'KibE_' . date('YmdHis');
    }
}
