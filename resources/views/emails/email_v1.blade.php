@extends('beautymail::templates.minty')

@section('content')

	@include('beautymail::templates.minty.contentStart', ['color' => '#FF0000'])
		<tr>
			<td class="title">
				{!! $data['title'] !!}
			</td>
		</tr>
		<tr>
			<td width="100%" height="10"></td>
		</tr>
		<tr>
			<td class="paragraph">
				{!! $data['body'] !!}
			</td>
		</tr>
		<tr>
			<td width="100%" height="25"></td>
		</tr>
		<tr>
			<td>
				@include('beautymail::templates.minty.button', ['text' => 'Learn More', 'link' => $data['link']])
			</td>
		</tr>
		<tr>
			<td width="100%" height="25"></td>
		</tr>
	@include('beautymail::templates.minty.contentEnd')
	<tr>
		<td width="100%" height="25"></td>
	</tr>

@stop