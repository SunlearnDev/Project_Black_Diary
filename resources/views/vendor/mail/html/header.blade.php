@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="\public\img\logo\2.png" class="logo" alt="Black Diary">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
