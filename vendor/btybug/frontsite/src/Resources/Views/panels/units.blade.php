<table class="table table-striped">
    <thead>
    <tr>
        <th>Units </th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
        @php
            BBRenderFrontLayout($page);
            $units = \Config::get('units',[]);
        @endphp
        @if(count($units))
            @foreach($units as $unit)
                <tr>
                    <td>
                        <p><b>Unit:</b> {!! $unit['unit']->title !!}</p>
                        <p><b>Variation:</b> {!!$unit['variation']->title !!}</p>
                    </td>
                    <td>

                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>