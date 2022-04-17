Notes and Tips :
Tampilan tabel packages berupa card yang berisi thumbnail, nama paket, harga awal, dan harga akhir.
Tampilan detail packages memuat juga card productnya.
Tabel detail_packages ga perlu dibuatin lengkap crudnya. Itu hanya untuk keperluan pendetailan paket berisi produk apa saja.
TIPS : Bila kurang yakin dengan image, dibuat tanpa image dulu. Nanti bila masih sempat baru dicoba bikin berisi image.

TAMBAHAN : Foto di paket dan produk ga harus, tapi akan jadi nilai tambah di penilaian keseluruhan
Rancangan Database
categories
• id : int auto_increment (pk)
• name : varchar(100)

products
• id : int auto_increment (pk)
• id_category : int (fk)
• name : varchar(100)
• photo path : text

packages
• id : int auto_increment (pk)
• normal_price : bigint
• end_price : bigint
• photo path : text

detail_packages
• id : int auto_increment (pk)
• id_package : int (fk)
• id_product : int (fk)
• quantity : int
