<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DÜZENLEME işlemleri</title>
</head>
<body>

<h3>Personel Listesi</h3>
<a href="<?php echo base_url("personel/insertPage/") ?>">[Kayıt Ekle]</a><br><br>

<form action="<?php echo base_url("personel/sort/") ?>" method="post">
    <select name="lists">
        <option value="id_list">ID'YE GÖRE (ARTAN)</option>
        <option value="id_list_reverse">ID'YE GÖRE (AZALAN)</option>
        <option value="title_list">ADA GÖRE (ARTAN)</option>
        <option value="title_list_reverse">ADA GÖRE (AZALAN)</option>
        <option value="detail_list">AÇIKLAMAYA GÖRE (ARTAN)</option>
        <option value="detail_list_reverse">AÇIKLAMAYA GÖRE (AZALAN)</option>
    </select>
    <button type="submit">Sırala</button><br><br>
</form>

<table border="1">
    <thead>
        <th>id</th>
        <th>Ad Soyad</th>
        <th>Açıklama</th>
        <th>İşlem</th>
    </thead>
        <?php foreach ($rows as $row) { ?>
            <tr>
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->title; ?></td>
                <td><?php echo $row->detail; ?></td>
                <td>
                    <a href="<?php echo base_url("personel/updatePage/$row->id") ?>">[Düzenle]</a>
                    <a href="<?php echo base_url("personel/delete/$row->id") ?>">[Sil]</a>
                </td>
            </tr>
        <?php } ?>
    <tbody>

    </tbody>
</table>

</body>
</html>