<x-dynamic-component
    :component="$getFieldWrapperView()"
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-action="$getHintAction()"
    :hint-color="$getHintColor()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
>
    <div >
        <!-- Interact with the `state` property in Alpine.js -->
        {{--<input name="photo" type="file">--}}
        <input id="fileInput" type="text" x-data="{ state: $wire.entangle('{{ $getStatePath() }}').defer }" />
    </div>

</x-dynamic-component>
