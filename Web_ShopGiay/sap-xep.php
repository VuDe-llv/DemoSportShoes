<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectFilter = document.getElementById('select-filter');

        selectFilter.addEventListener('change', function() {
            const selectedOption = selectFilter.value;
            sortProducts(selectedOption);
        });

        function sortProducts(sortOption) {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'pages/giaybongda/tat-ca-san-pham.php?sort=' + sortOption, true);

            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 400) {
                    // Thay thế nội dung của container với dữ liệu mới từ máy chủ
                    const container = document.querySelector('.container-xxl .row');
                    container.innerHTML = xhr.responseText;
                } else {
                    console.error('Lỗi khi thực hiện truy vấn AJAX');
                }
            };

            xhr.send();
        }
    });
</script>
