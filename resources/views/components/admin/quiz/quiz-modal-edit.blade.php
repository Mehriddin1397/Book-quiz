<!--! ================================================================ !-->
@foreach($quizes as $quiz )
    <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="tasksDetailsOffcanvasEdit{{ $quiz->id }}">
        <div class="offcanvas-header border-bottom" style="padding-top: 20px; padding-bottom: 20px">
            <div class="d-flex align-items-center">
                <div class="avatar-text avatar-md items-details-close-trigger" data-bs-dismiss="offcanvas"
                     data-bs-toggle="tooltip" data-bs-trigger="hover" title="Details Close">
                    <i class="feather-arrow-left"></i>
                </div>
                <span class="vr text-muted mx-4"></span>
                <a href="javascript:void(0);">
                    <h2 class="fs-14 fw-bold text-truncate-1-line">Category</h2>
                    <span class="fs-12 fw-normal text-muted text-truncate-1-line">Category Edit</span>
                </a>
            </div>
        </div>

        <div class="offcanvas-body">
            <form action="{{ route('quizzes.update', $quiz->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Title:</label>
                            <input type="text" name="title" class="form-control" value="{{old('title',$quiz->title)}}" required>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label"> Sarlavhasi:</label>
                        <textarea name="description" class="form-control">{{old('description',$quiz->description)}}</textarea>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Saqlash</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endforeach

<!--! ================================================================ !-->
<!--! [End] Tasks Details Offcanvas !-->
