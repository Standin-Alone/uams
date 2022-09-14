<div class="col-lg-12"> <br>
    <div class="row">
        <div class="col-md-3">
            <select data-column="0" class="form-control filter-select" name="partner_name" id="partner_name">
                <option value="">-- Select Partner --</option>
                @foreach ($partner_list as $data)
                    <option value="{{$data->partner_name}}">{{$data->partner_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="col-lg-12"> <br>
    <div class="row">
        <div class="col-md-3">
            <select data-column="7" class="form-control filter-select" name="reg_name" id="reg_name">
                <option value="">-- Select Region --</option>
                @foreach ($reg_list as $data)
                    <option value="{{$data->reg_name}}">{{$data->reg_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <select data-column="8" class="form-control filter-select" name="prov_name" id="prov_name">
                <option value="">-- Select Province --</option>
                @foreach ($prov_list as $data)
                    <option value="{{$data->prov_name}}">{{$data->prov_name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <select data-column="9" class="form-control filter-select" name="mun_name" id="mun_name">
                <option value="">-- Select Municipality --</option>
                @foreach ($mun_list as $data)
                    <option value="{{$data->mun_name}}">{{$data->mun_name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <select data-column="10" class="form-control filter-select" name="bgy_name" id="bgy_name">
                <option value="">-- Select Barangay --</option>
                @foreach ($bgy_list as $data)
                    <option value="{{$data->bgy_name}}">{{$data->bgy_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>