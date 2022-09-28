<!-- Bài luyện tập Lab OOP
Yêu cầu sử dụng tầm vực public, protected, private phù hợp -->
<!-- 1- Xây dựng đối tượng TinhToan gồm thuộc tính số a, số b
- Interface PhepTinh gồm cộng trừ nhân chia
- Định nghĩa các phương thức và sử dụng đối tượng TinhToan để kiểm tra các phép tính -->
<!-- 2-- Xây dựng đối tượng ConNguoi gồm tên(string), tuổi (number), giới tính (number), ngày sinh(date), cân nặng(number), chiều cao(number)
- Xây dựng đối tượng VanDongVien kế thừa ConNguoi, 
    - có thêm thuộc tính: số huy chương(number), các môn đã thi đấu(array)
    - Có thêm phương thức: 
        - construct, 
        - hiển thị thông tin
        - thi đấu (nhận vào 2 tham số: môn thi đấu đã khởi tạo theo đối tượng bên dưới, số huy chương và kiểm tra nếu điều kiện chiều cao cân nặng không thoả mãn thì bị trừ số huy chương tương ứng đáng ra nhận được)
- Xây dựng đối tượng MonThiDau gồm tên(string), điều kiện chiều cao(number), điều kiện cân nặng(number)
 -->
 <?php
    // 1>
    interface PhepTinh {
        function phepcong($a,$b);
        function pheptru($a,$b);
        function phepnhan($a,$b);
        function phepchia($a,$b);
    }
    class TinhToan implements PhepTinh {
        public function phepcong($a,$b)
        {
            return $this->a+$this->b;
        }
        public function pheptru($a,$b)
        {
            return $this->a-$this->b;
        }
        public function phepnhan($a,$b)
        {
            return $this->a*$this->b;
        }
        public function phepchia($a,$b)
        {
            return $this->a/$this->b;
        }

    }
    //2>
    abstract class ConNguoi {
        var $ten;
        var $tuoi;
        var $gioitinh;
        var $ngaysinh;
        var $cannang;
        var $chieucao;
    }

    class MonThiDau {
        public $chieucao;
        public $cannang;
        public $tenmon;
        public function huyChuong() {
            if($this->cannang >=50 && $this->cannang <=70 ){
                if($this->chieucao >= 170) {
                    return true;
                }else {
                    return false;
                }
            }else {
                return false;
            }
        }
    }

    $monThiDau = new MonThiDau;
    $monThiDau->chieucao = 180;
    $monThiDau->cannang = 60;
    $monThiDau->temmon = "Nhay cau";


    class VanDongVien extends ConNguoi {
        function __construct($ten, $tuoi, $gioitinh, $ngaysinh, $cannang, $chieucao, $sohuychuong, $cacmondathidau)
    {
        $this->ten = $ten;
        $this->tuoi = $tuoi;
        $this->gioitinh = $gioitinh;
        $this->ngaysinh = $ngaysinh;
        $this->cannang = $cannang;
        $this->chieucao = $chieucao;
        $this->sohuychuong = $sohuychuong;
        $this->cacmondathidau = $cacmondathidau;
    }
    function hienThiThongTin() {
        return "Ten: " . $this->ten ."Tuoi: " .$this->tuoi;
    }
    function thiDau($monthi, $sohuychuong) {
        if($monthi == true) {
            return "So huy chuong cua ban la: $sohuychuong";
        }else {
            return "Ban da bi huy $sohuychuong huy chuong";
        }
    }
    }

    $vanDongVien1 = new VanDongVien("Long", 20, "Nam", "2002-18-11",60, 175, 5, 5);

   echo ( $vanDongVien1->thiDau($monThiDau->huyChuong(), 20));

?>