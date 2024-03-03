@if($records->hasPages())
<div class="p-4 bg-white">
    {!! $records->links() !!}
</div>
@endif
