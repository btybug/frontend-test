<div class="col-md-6">
    {!! Form::text("conditions[$slug][$new_slug][expression_from]",(isset($inside["expression_from"])) ? $inside['expression_from'] : null,['class' => 'form-control','placeholder' =>'From ...']) !!}
</div>
<div class="col-md-6">
    {!! Form::text("conditions[$slug][$new_slug][expression_to]",(isset($inside["expression_to"])) ? $inside['expression_to'] : null,['class' => 'form-control','placeholder' =>'To ...']) !!}

</div>
