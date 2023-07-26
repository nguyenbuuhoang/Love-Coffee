<?php
    class tmdt extends myfile{
        public function connect(){
            $con = mysql_connect("localhost", "ql_coffee", "123456789");
			if(!$con){
				echo 'Không kết nối';
				exit();
			}else{
				mysql_select_db("love_coffee");
				mysql_query("SET NAMES UTF8");
				return $con;
			}
        }
        public function loadloai($sql){
			$link = $this -> connect();
			$ketqua = mysql_query($sql,$link);
			mysql_close($link);
			$i = mysql_num_rows($ketqua);
			if($i > 0){
				while($row=mysql_fetch_array($ketqua)){
					$id = $row['maloai'];
					$loai_sp = $row['loai_sp'];
					echo'<li style="font-size: 15px; padding-left: 10px;" data-filter=".'.$id.'">'.$loai_sp.'</li>';
				}
			}else{
				echo 'không có dữ liệu';
			}
		}
		public function loadsanpham($sql){
			$link = $this -> connect();
			$ketqua = mysql_query($sql,$link);
			mysql_close($link);
			$i = mysql_num_rows($ketqua);
			if($i > 0){
				while($row=mysql_fetch_array($ketqua)){
					$masp = $row['masp'];
					$tensp = $row['tensp'];
					$hinh = $row['hinhanh'];
					$gia = $row['gia'];
					$id = $row['maloai'];
					echo '<div class="col-lg-4 col-md-4 all '.$id.' ">
                      <div class="product-item">
                        <div class="container img">
                          <img src="assets/images/'.$hinh.'" alt="'.$tensp.'">
                        </div>
                        <div class="down-content">
                          <h3>'.$tensp.'</h3>
                          <p class="price">Giá: '.$gia.' vnđ</p>
                          <form action="buying.php" method="post">
                            <div class="form-group form-inline">
                              <label for="sl">Số lượng: </label>
                              <input class="form-control" type="number" name="sl" id="sl" min=1 max=10 required>
                            </div>';
							if($id == 3 || $id == 4){
								
							}else{
								echo'<div class="form-group form-inline">
										<label style="padding-right: 10px;">Size:</label>
							    		<div class="form-check-inline">
  											<label class="form-check-label">
    											<input type="radio" class="form-check-input" name="chk" value="Lớn" required>Lớn
  											</label>
										</div>
										<div class="form-check-inline">
  											<label class="form-check-label">
    											<input type="radio" class="form-check-input" name="chk" value="Vừa" required>Vừa
  											</label>
										</div>
										<div class="form-check-inline">
  											<label class="form-check-label">
    											<input type="radio" class="form-check-input" name="chk" value="Nhỏ" required>Nhỏ
  											</label>
										</div>
									</div>'; 
							}
                            echo '<input class="btn" type="submit" value="Mua hàng" name="addbuy">
                            <input type="hidden" name="tensp" value="'.$tensp.'">
                            <input type="hidden" name="giasp" value="'.$gia.'">
                            <input type="hidden" name="hinhsp" value="'.$hinh.'">
                          </form>
                        </div>
                      </div>
                    </div>';
				}
			}else{
				echo 'Đang cập nhật dữ liệu...';
			}
		}
		public function themxoasua($sql){
			$link = $this->connect();
			if(mysql_query($sql,$link)){
				return 1;
			}else{
				return 2;
			}
		}
		public function load_loai_list($sql){
			$link = $this -> connect();
			$ketqua = mysql_query($sql,$link);
			mysql_close($link);
			$i = mysql_num_rows($ketqua);
			if($i > 0){
				echo'<div class="dropdown" style="margin-top: 10px;">
					  <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" style="background-color: #D2691E; color:white;">
						Chọn loại sản phẩm
					  </button>
					  <div class="dropdown-menu">';
				echo '<a class="dropdown-item" href="listSP.php?id=*">Tất cả sản phẩm</a>';
				while($row=mysql_fetch_array($ketqua)){
					$maloai = $row['maloai'];
					$loaisp = $row['loai_sp'];
					echo '<a class="dropdown-item" href="listSP.php?id='.$maloai.'">'.$loaisp.'</a>';
				}
				echo '</div>';
				echo '</div>';
			}else{
				echo 'Lỗi...';
			}
		}
		public function loadList($sql){
			$link = $this -> connect();
			$ketqua = mysql_query($sql,$link);
			mysql_close($link);
			$i = mysql_num_rows($ketqua);
			if($i > 0){
				$stt = 1;
				while($row=mysql_fetch_array($ketqua)){
					$id = $row['masp'];
					$tensp = $row['tensp'];
					$sl = $row['soluong'];
					$hinh = $row['hinhanh'];
					$gia = $row['gia'];
					$ml = $row['maloai'];
					echo'<tbody id="list-admin" style="background-color: white;">
							<tr>
								<td style="text-align: right;"><a style="color: black;" href="?id='.$id.'">'.$stt.'</a></td>
								<td><a style="color: black;" href="?id='.$id.'">'.$tensp.'</a></td>
								<td align="center"><img class="thumbnail" src="assets/images/'.$hinh.'" alt="'.$tensp.'" width="75px" height="70px"></td>
								<td style="text-align: right;"><a style="color: black;" href="?id='.$id.'"">'.$sl.'</a></td>
								<td style="text-align: right;"><a style="color: black;" href="?id='.$id.'">'.$gia.'</a> vnđ</td>
								<td style="text-align: right;"><a style="color: black;" href="?id='.$id.'">'.$ml.'</a></td>
							</tr>
					     </tbody>';
					$stt++;	
				}
			}else{
				echo 'Không có dữ liệu...';
			}
		}
		public function loadDS($sql){
			$link = $this -> connect();
			$ketqua = mysql_query($sql,$link);
			mysql_close($link);
			$i = mysql_num_rows($ketqua);
			if($i > 0){
				$stt = 1;
				while($row=mysql_fetch_array($ketqua)){
					$id = $row['masp'];
					$tensp = $row['tensp'];
					$sl = $row['soluong'];
					$hinh = $row['hinhanh'];
					$gia = $row['gia'];
					$ml = $row['maloai'];
					echo'<tbody style="background-color: white;">
							<tr>
								<td style="text-align: right;">'.$stt.'</td>
								<td style="text-align: right;">'.$id.'</td>
								<td>'.$tensp.'</td>
								<td align="center"><img class="thumbnail" src="assets/images/'.$hinh.'" alt="'.$tensp.'" width="75px" height="70px"></td>
								<td style="text-align: right;">'.$sl.'</td>
								<td style="text-align: right;">'.$gia.' vnđ</td>
								<td style="text-align: right;">'.$ml.'</td>
							</tr>
					     </tbody>';
					$stt++;	
				}
			}else{
				echo 'Không có dữ liệu...';
			}
		}
        public function loadCot($sql){
			$link = $this -> connect();
			$ketqua = mysql_query($sql,$link);
			mysql_close($link);
			$i = mysql_num_rows($ketqua);
			$kq = '';
			if($i > 0){
				while($row=mysql_fetch_array($ketqua)){
					$id = $row[0];
					$kq = $id;
				}
			}
			return $kq;
		}
		public function loadHD($sql){
			$link = $this -> connect();
			$ketqua = mysql_query($sql,$link);
			mysql_close($link);
			$i = mysql_num_rows($ketqua);
			if($i > 0){
				$stt = 1;
				while($row=mysql_fetch_array($ketqua)){
					$id = $row['id_hd'];
					$tenkh = $row['tenkh'];
					$sdt = $row['sodt'];
					$diachi = $row['diachi'];
					$ngayhd = $row['ngayhd'];
					$tong = $row['tong'];
					$magiam = $row['magiam'];
					$htthanhtoan = $row['htthanhtoan'];
					echo'<tbody id="myHD" style="background-color: white;">
							<tr>
								<td style="text-align: right;"><a style="color: black;" href="?id='.$id.'">'.$stt.'</a></td>
								<td style="text-align: right;"><a style="color: black;" href="?id='.$id.'">'.$id.'</a></td>
								<td><a style="color: black;" href="?id='.$id.'">'.$tenkh.'</a></td>
								<td align="center"><a style="color: black;" href="?id='.$id.'">'.$sdt.'</a></td>
								<td><a style="color: black;" href="?id='.$id.'">'.$diachi.'</a></td>
								<td style="text-align: center;"><a style="color: black;" href="?id='.$id.'">'.$ngayhd.'</a></td>
								<td style="text-align: right;"><a style="color: black;" href="?id='.$id.'">'.$tong.'</a> vnđ</td>
								<td style="text-align: center;"><a style="color: black;" href="?id='.$id.'">'.$magiam.'</a></td>
								<td style="text-align: center;"><a style="color: black;" href="?id='.$id.'">'.$htthanhtoan.'</a></td>
							</tr>
					     </tbody>';
					$stt++;	
				}
			}else{
				echo '<tfoot>
						<tr>
							<td colspan="8">Không có dữ liệu...</td>
						</tr>
					</tfoot>';
			}
		}
		public function loadCTHD($sql){
			$link = $this -> connect();
			$ketqua = mysql_query($sql,$link);
			mysql_close($link);
			$i = mysql_num_rows($ketqua);
			if($i > 0){
				$stt = 1;
				while($row=mysql_fetch_array($ketqua)){
					$id = $row['id_hd'];
					$tensp = $row['tensp'];
					$sl = $row['soluong'];
					$size = $row['size'];
					$gia = $row['giasp'];
					$tt = $row['thanhtien'];
					echo'<tbody style="background-color: white;">
							<tr>
								<td style="text-align: right;">'.$stt.'</td>
								<td>'.$tensp.'</td>
								<td style="text-align: right;">'.$sl.'</td>
								<td>'.$size.'</td>
								<td style="text-align: right;">'.$gia.' vnđ</td>
								<td style="text-align: right;">'.$tt.'</td>
							</tr>
					     </tbody>';
					$stt++;	
				}
			}else{
				echo 'Không có dữ liệu...';
			}
		}
    }
	class myfile{
        function upload_file($name, $tmp_name, $folder){
            if ($name != '' && $folder != '') {
                if (move_uploaded_file($tmp_name, $name)) {
                    return 1;
                } else {
                    return 0;
                }
            } else {
                return 0;
            }
            
        }
    }   
?>