@extends('admin.layouts.master')
@section('title','Create Footer Social Links')

@section('content')
<section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Footer Social Links</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Create Social Link</h4>
            </div>
            <div class="card-body">
                <form action="{{route('admin.footer-social.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Icon</label>
                        <div class="col-sm-12 col-md-7">
                            <select name="icon" class="form-control" id="icon-select">
                              <option value="">Select Icon</option>
                              <option value="fab fa-github">GitHub</option>
                              <option value="fab fa-linkedin-in">LinkedIn</option>
                              <option value="fab fa-facebook-f">Facebook</option>
                              <option value="fab fa-instagram">Instagram</option>
                              <option value="fab fa-youtube">YouTube</option>
                          </select>
                        </div>
                      </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Url</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="url" class="form-control" value="">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Create</button>
                      </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        // Master layout ne select2 already apply kar diya hoga, usay destroy karke normal select bana do
        if ($('#icon-select').hasClass('select2-hidden-accessible')) {
            $('#icon-select').select2('destroy');
        }

        document.getElementById('count').innerText =
            document.getElementById('icon-select').options.length;
    });
</script>
@endpush