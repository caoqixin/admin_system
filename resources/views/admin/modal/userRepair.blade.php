<p class="bg-primary">维修记录</p>

<table class="table table-hover">
    @if(empty($data))
        <p>目前暂无任何维修记录</p>
    @else
        <thead>
        <tr>
            <th>维修ID</th>
            <th>维修类型</th>
            <th>手机型号</th>
            <th>维修问题</th>
            <th>维修状态</th>
            <th>维修时间</th>
        </tr>
        </thead>
        <tbody>

        @foreach($data as $items)
            <tr>
                @foreach($items as $item)
                    <td>{{$item['id']}}</td>
                    <td>{{ config('manager.repair.type')[$item['type']] == 'standard' ? '常规维修' : '主板维修'}}</td>
                    <td>{{ \App\Models\Repair::find($item['id'])->details[0]->model ?? ' ' }}</td>
                    <td>{{ implode(',', array_map(function ($problem) { return \App\Models\Category::find($problem)->name; }, $item['problem'])) }}</td>
                    <td>{{ (config('manager.repair.status')[config('manager.repair.type')[$item['type']]])[$item['status']] }}</td>
                    <td>{{$item['created_at']}}</td>
            </tr>
        @endforeach

        @endforeach

        </tbody>
    @endif

</table>
