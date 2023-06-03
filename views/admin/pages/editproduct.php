<div class="content-wrapper">
  <div class="row">
    <div class="offset-md-1 col-md-10 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Chỉnh sửa sản phẩm</h4>
          <p class="card-description">
            Vui lòng điền vào tất cả các ô
          </p>
          <form class="forms-sample">
            <div class="form-group">
              <label for="exampleInputUsername1">Tên sản phẩm</label>
              <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Nhập tên sản phẩm">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Mô tả</label>
              <textarea class="form-control" id="exampleTextarea1" rows="4" placeholder="Nhập mô tả"></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Link ảnh</label>
              <div class="align-items-center d-flex">

                <div class="col-md-3 col-4">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="" checked>
                      Dán link ảnh
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
                      Chọn ảnh từ máy
                    </label>
                  </div>
                </div>
                <div class="col-md-9 col-8">
                  <div class="input-url">
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập URL ảnh">
                  </div>
                  <div class="upload-file" style="display: none;">
                    <input type="file" name="img[]" class="file-upload-default">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Upload ảnh">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                      </span>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputConfirmPassword1">Giá</label>
              <input type="number" class="form-control" id="exampleInputConfirmPassword1" placeholder="Nhập giá sản phẩm">
            </div>
            <div class="form-group">
              <label for="exampleInputConfirmPassword1">Đơn vị</label>
              <input type="text" class="form-control" id="exampleInputConfirmPassword1" placeholder="Nhập đơn vị tính">
            </div>
            <div class="form-group">
              <label>Loại sản phẩm</label>
              <select class="js-example-basic-single w-100">
                <option disabled selected>Chọn loại sản phẩm</option>
                <option value="traicay">Trái cây</option>
                <option value="raucu">Rau củ</option>
                <option value="trung">Trứng</option>
                <option value="gao">Gạo</option>
                <option value="mi">Mì, bún khô</option>
                <option value="tra">Trà</option>
                <option value="caphe">Cà phê</option>
                <option value="tieu">Tiêu, Điều</option>
                <option value="bosua">Bơ, Sữa, phô mai</option>
                <option value="mut">Mứt, Trái cây sấy</option>
                <option value="chay">Thực phẩm chay</option>
                <option value="nuoc">Nước trái cây</option>
              </select>
            </div>
            <div class="form-group">
              <label for="countries">Xuất xứ</label>
              <input id="countries" class="form-control typeahead bloodhound" type="text" placeholder="Nhập xuất xứ">
            </div>
            <div class="align-items-center d-flex row">
              <button type="submit" class="offset-4 col-4 btn btn-primary me-2">Xác nhận</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- content-wrapper ends -->