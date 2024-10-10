<!--! ================================================================ !-->
@foreach($codes as $code )
    <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="tasksDetailsOffcanvasEdit{{ $code->id }}">
        <div class="offcanvas-header border-bottom" style="padding-top: 20px; padding-bottom: 20px">
            <div class="d-flex align-items-center">
                <div class="avatar-text avatar-md items-details-close-trigger" data-bs-dismiss="offcanvas"
                     data-bs-toggle="tooltip" data-bs-trigger="hover" title="Details Close">
                    <i class="feather-arrow-left"></i>
                </div>
                <span class="vr text-muted mx-4"></span>
                <a href="javascript:void(0);">
                    <h2 class="fs-14 fw-bold text-truncate-1-line">Code</h2>
                    <span class="fs-12 fw-normal text-muted text-truncate-1-line">Kodni o'zgartirish</span>
                </a>
            </div>
        </div>

        <div class="offcanvas-body">
            <form action="{{ route('code.update',$code->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Kodni o'zgartirish:</label>
                            <input type="text" name="code" value="{{old('code',$code->code)}}" class="form-control">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary d-inline-block mt-4">Saqlash</button>
            </form>
        </div>
    </div>
@endforeach

<!--! ================================================================ !-->
<!--! [End] Tasks Details Offcanvas !-->
