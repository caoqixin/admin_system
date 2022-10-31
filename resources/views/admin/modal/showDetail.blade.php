<p class="bg-primary">维修信息</p>
@foreach($data as $item)
    <p>ID Riparazione: {{ $item['id'] }}</p>
    <p>Stato: {{ (config('manager.repair.status')[config('manager.repair.type')[$item['type']]])[$item['status']]  }}</p>
    <p>Cauzione: {{ $item['deposit'] }} €</p>
    <p>Prezzo Totale: {{ $item['price'] }} €</p>
    <p>Da Pagare: {{ $item['price'] - $item['deposit'] }} €</p>
    <p>Data: {{ $item['created_at'] }}</p>

    @if($item['details'])
        <p class="bg-aqua">手机详情</p>
        @foreach($item['details'] as $detail)
            <p>手机型号: {{ $detail['model'] }}</p>
            <p>手机密码: {{ $detail['password'] }}</p>
            <p>IMEI: {{ $detail['imei'] }}</p>
            <p>备注: {{ $detail['note'] }}</p>
        @endforeach
    @endif

    @if($item['costumers'])
        <p class="bg-info">用户详情</p>
        @foreach($item['costumers'] as $costumer)
            <p>客户名字: {{ $costumer['name'] }}</p>
            <p>客户联系方式: {{ $costumer['phone_number'] }}</p>
        @endforeach
    @endif

    @if($item['orders'])
        <p class="bg-purple">订单详情</p>
        @foreach($item['orders'] as $order)
            <p>订单号: {{ $order['order_id'] }}</p>
            <p>订单进度: {{ config('manager.order.status')[$order['status']] }}</p>
        @endforeach
    @endif

@endforeach
