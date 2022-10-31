<section class="invoice">
    <div class="row">
        <div class="col-xs-offset-5 h3">
            <b class="">Scheda di Garanzia</b>
        </div>
    </div>
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-globe"></i> Mediatech Bologna
                <small class="pull-right">Data Ritiro: {{ $warranty['taked_at'] }}</small>
            </h2>
        </div>
        <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            <address>
                <strong>Mediatech Bologna</strong><br>
                Via Ferrarese 149/d<br>
                Bologna 40128<br>
                Numero Telefono: 331-423-8522<br>
                Email: mediatech012c@gmail.com
            </address>
        </div>
        <div class="col-sm-4 invoice-col">
            @foreach($user as $item)
                <address>
                    <strong>Dati del Cliente</strong><br>
                    <b>Numero Tefono: </b>{{ $item['name'] }}<br>
                    <b>Nome: </b>{{ $item['phone_number'] }}<br>
                </address>
            @endforeach
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <b>No. Garanzia: </b>{{ $warranty['id'] }}<br>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
        <b>Dettaglio di Telefono</b>
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Modello</th>
                    <th>Password</th>
                    <th>Imei</th>
                    <th>Descrizione</th>
                </tr>
                </thead>
                <tbody>
                @foreach($details as $detail)
                    <tr>
                        <td>{{ $detail['model'] }}</td>
                        <td>{{ $detail['password'] }}</td>
                        <td>{{ $detail['imei'] }}</td>
                        <td>{{ $detail['note'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- /.row -->

    <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
            <b>Problema di telefono: </b><br>
            {{ implode(',', array_map(function ($problem) { return \App\Models\Category::find($problem)->name; }, $repair['problem'])) }}
            <br>
            <b>Data di Scadenza:</b><br>
            {{ $warranty['expired_at'] }}
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
            <p class="lead">Pagamenti</p>

            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Totale Pagato:</th>
                        <td>€ {{ $repair['price'] }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-xs-12">
            <button type="button" class="btn btn-default" onclick="window.print()">
                <i class="fa fa-print"></i> Print
            </button>
            <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;"
                    onclick="window.history.back()"
            >
                <i class="fa fa-fast-backward"></i> 返回列表
            </button>
        </div>
    </div>
</section>
