<!-- Modal -->
<div class="modal fade" id="delete{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('category.delete category')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('categories.destroy', 'test') }}" method="post">
                {{ method_field('delete') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $category->id }}">
                    <h5>{{trans('messages.warning')}}</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('category.close')}}</button>
                    <button type="submit" class="btn btn-danger">{{trans('category.delete')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
