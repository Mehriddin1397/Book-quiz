<!--! ================================================================ !-->
@foreach($questions as $question )
    <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="tasksDetailsOffcanvasEdit{{ $question->id }}">
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
            <form action="{{ route('questions.update',$question->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Testlar:</label>
                        <select name="quiz_id" class="form-select form-control" data-select2-selector="label">
                            @foreach($quizzes as $quiz)
                                <option value="{{ $quiz->id }}" {{ old('quiz_id') == $quiz->id ? 'selected' : '' }}>
                                    {{ $quiz->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label"> Savol:</label>
                        <textarea name="question" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Savol rasmi (kerak bulsa):</label>
                            <input type="file" name="photo" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">A variant:</label>
                            <input type="text" name="a" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">B variant:</label>
                            <input type="text" name="b" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">C variant:</label>
                            <input type="text" name="c" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label">D variant:</label>
                            <input type="text" name="d" class="form-control">
                        </div>
                    </div>
                    <select name="ans" class="form-select form-control" data-select2-selector="label">
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                        <option value="d">D</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary d-inline-block mt-4">Savol qo'shish</button>
            </form>
        </div>
    </div>
@endforeach

<!--! ================================================================ !-->
<!--! [End] Tasks Details Offcanvas !-->
