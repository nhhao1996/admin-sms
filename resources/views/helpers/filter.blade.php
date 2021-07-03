<div class="form-group m-form__group row align-items-center" style="padding:5px 15px;">
	@php $i = 0; @endphp
    @foreach ($FILTER as $name => $item)
    	@if ($i > 0 && ($i % 4 == 0))
			</div>
			<div class="form-group m-form__group row align-items-center" style="padding:5px 15px;">    		
    	@endif
    	@php $i++; @endphp
    	<div class="col-lg-3 input-group">
    		<div class="input-group-append">
    			<span class="input-group-text">
    				{{ $item['text'] }}
    			</span>
    		</div>
    		{!! Form::select($name, $item['data'], $item['default'] ?? null, ['class' => 'form-control m-input']) !!}
    	</div>
    @endforeach
</div>