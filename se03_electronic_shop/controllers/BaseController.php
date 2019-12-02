<?php 

class BaseController {

	public function __construct()
    {        
        
    }

    protected function featuredNews()
    {
        $news = [
            'Tin tuc 1',
            'Tin tuc 2'
        ];
        return $news;
    }

	// Hàm hiển thị kết quả ra cho người dùng.
    public function render($view, $data = array())
    {
        
		// Kiểm tra file gọi đến có tồn tại hay không?
        
		$view = @str_replace('.', '/', $view);
		$viewFile = VIEW_PATH . $view . '.php';
		
    	if (is_file($viewFile)) {
			// Nếu tồn tại file đó thì tạo ra các biến chứa giá trị truyền vào lúc gọi hàm
    		extract($data);
			// Sau đó lưu giá trị trả về khi chạy file view template với các dữ liệu đó vào 1 biến chứ chưa hiển thị luôn ra trình duyệt
    		ob_start();
    		require_once($viewFile);
    		$content = ob_get_clean();
			// Sau khi có kết quả đã được lưu vào biến $content, gọi ra template chung của hệ thống đế hiển thị ra cho người dùng
    		require_once(VIEW_PATH . 'layouts/layout.php');
    	} else {
			// Nếu file muốn gọi ra không tồn tại thì chuyển hướng đến trang báo lỗi.
    		header('Location: index.php?c=pages&m=error');
    	}
    }
}