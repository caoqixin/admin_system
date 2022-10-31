<section class="invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-globe"></i> Mediatech Bologna
                <small class="pull-right">Data: {{ date('d/m/Y', strtotime($orders['created_at'])) }}</small>
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
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <b>No. Ordine: </b>{{ $orders['order_id'] }}<br>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Qty</th>
                    <th>Prodotto</th>
                    <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $orders['product_name'] }}</td>
                    <td>€ {{  $orders['price']  }}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">

        </div>
        <!-- /.col -->
        <div class="col-xs-6 col-xs-offset-6">
            <p class="lead">Pagamenti</p>

            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th style="width:50%">Anticipo:</th>
                        <td>€ {{ $orders['deposit'] ?? 0.00 }}</td>
                    </tr>
                    <tr>
                        <th>Totale:</th>
                        <td>€ {{  $orders['price']  }}</td>
                    </tr>
                    <tr>
                        <th>Total Da Pagare:</th>
                        <td>€ {{  $orders['price'] - $orders['deposit']  }}</td>
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
            <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                <i class="fa fa-download"></i> Generate PDF
            </button>
            <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;"
                    onclick="window.history.back()"
            >
                <i class="fa fa-fast-backward"></i> 返回列表
            </button>
        </div>
    </div>
</section>
