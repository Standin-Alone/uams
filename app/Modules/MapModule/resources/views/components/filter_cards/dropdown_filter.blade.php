<div class="panel panel-primary col-md-12">
    <div class="panel-heading">Select by Region</div>
    <div class="panel-body border">
        <div class="form-group">
          <label for=""></label>
          <select class="form-control filter-select" name="filter_region" id="filter_region">
              <option value="">-- Select Region --</option>
              @foreach ($regions as $reg)
                <option value="{{$reg->reg_code}}">{{$reg->reg_name}}</option>
              @endforeach
          </select>
        </div>
    </div>
</div>

<div class="panel panel-primary col-md-12">
    <div class="panel-heading">Select by Province</div>
    <div class="panel-body border">
        <div class="form-group">
          <label for=""></label>
          <select class="form-control" name="filter_Province" id="filter_Province">

          </select>
        </div>
    </div>
</div>

<div class="panel panel-primary col-md-12">
    <div class="panel-heading">Select by Municipality</div>
    <div class="panel-body border">
        <div class="form-group">
          <label for=""></label>
          <select class="form-control filter-select" name="filter_Municipality" id="filter_Municipality">
              <option value="">-- Select Municipality --</option>

          </select>
        </div>
    </div>
</div>

<div class="panel panel-primary col-md-12">
    <div class="panel-heading">Select by Barangay</div>
    <div class="panel-body border">
        <div class="form-group">
          <label for=""></label>
          <select class="form-control filter-select" name="filter_Barangay" id="filter_Barangay">
              <option value="">-- Select Barangay --</option>

          </select>
        </div>
    </div>
</div>