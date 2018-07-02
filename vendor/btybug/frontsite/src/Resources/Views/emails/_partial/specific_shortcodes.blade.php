@if(count($shortcodes))
    <table class="table borderless m-0">
        <tbody>
        <tr>
            <td class="specific-sc-container">
                @foreach($shortcodes as $shortcode)
                    <div class="sc-item m-b-5">[special key={!! $shortcode->column_name !!}]</div>
                @endforeach
            </td>
        </tr>
        </tbody>
    </table>
@endif