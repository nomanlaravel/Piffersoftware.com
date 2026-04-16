<?php


if (!function_exists('getFilePreview')) {

function getFilePreview($filePath) {

    $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

    if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
        return "<img src='" . asset($filePath) . "' alt='Image Preview' class='image-preview' style='height:100px;width:100px;'>";

    } elseif ($extension == 'mp4') {
        return "<video width='120' height='100' controls>
                    <source src='" . asset($filePath) . "' type='video/mp4'>
                </video>";

    } elseif ($extension == 'pdf') {
        return "<img src='https://img.icons8.com/?size=100&id=mcyAsTDJNTI9&format=png' alt='PDF File' style='height:100px;width:100px;'>";

    } elseif (in_array($extension, ['xlsx', 'xls'])) {
        return "<img src='https://img.icons8.com/?size=48&id=117561&format=png' alt='Excel File' style='height:100px;width:100px;'>";

    } elseif (in_array($extension, ['zip', 'rar'])) {
        return "<img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTb7rfjFBWn453fYAj1o3T7fsbSYvBzdEn4jOV8FdclTI7NpIDMZfZ_x79_o3FrxsYpUeQ&usqp=CAU'
        alt='ZIP File' style='height:100px;width:100px;'>";

    } else {
        return "<img src='https://img.freepik.com/premium-vector/hand-drawn-no-data-illustration_23-2150696446.jpg' width='80' height='100'>";
    }

}
}

 