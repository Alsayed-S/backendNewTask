<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('category.add category') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('categories.store')}}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <label for="exampleInputPassword1">{{trans('category.category name')}}</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="modal-body">
                    <label for="exampleInputPassword1">{{trans('category.details')}}</label>
                    <textarea name="details" id="details" cols="30" rows="3" class="form-control"></textarea>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('category.close')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('category.add')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end Modal -->
