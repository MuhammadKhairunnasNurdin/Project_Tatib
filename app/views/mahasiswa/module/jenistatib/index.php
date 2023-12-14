 <style>
     body {
         font-family: Arial, sans-serif;
     }

     .border-tatib {
         display: flex;
         flex-direction: column;
         align-items: center;
         width: 1029px;
         height: 610px;
         padding: 10px;
         margin: auto;
         border-radius: 25px;
         background: rgba(255, 255, 255, 0.80);
         box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
         margin-top: 18px;
     }

     .box-tatib {
         display: flex;
         width: 750px;
         height: 75px;
         flex-shrink: 0;
         background-color: white;
         padding: 10px;
         margin-top: 30px;
         justify-content: space-between;
         border-radius: 15px;
         background: #FFF;
         box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
        

     }

     .text-tatib,
     .text-tatib:hover {
         color: #494B4B;
         text-align: center;
         font-family: Anek Telugu;
         font-size: 32px;
         font-style: normal;
         font-weight: 600;
         line-height: normal;
         margin: auto;
         text-decoration: none;
         cursor: pointer;
         /* Menambahkan ini untuk menghilangkan underline */
     }

     .box-tatib:hover {
         border: 2px solid #3498db;
         border-radius: 8px;
         background-color: #0d366b;
         margin-left: 2px;
         padding: 0px 1px;
         cursor: pointer;
     }

     a {
         text-decoration: none;
     }

     .box-tatib:hover .text-tatib {
         filter: brightness(0) invert(1);
         cursor: pointer;
     }

     .logo-container {
         display: flex;
         align-items: center;

     }

     .logo-jenis-tatib {
         width: 30px;
         /* Sesuaikan ukuran logo sesuai kebutuhan */
         height: auto;
         margin-right: 40px;
         font-size: 24px;
         margin-left: 40px;
         color: #363637;
         
         /* Sesuaikan jarak antara logo dan teks */
     }

     .Text-judul {
         color: #403737;
         text-align: center;
         font-family: Anek Telugu;
         font-size: 32px;
         font-style: normal;
         font-weight: 600;
         line-height: normal;
         margin-top: 30px;
         /* Sesuaikan ukuran font sesuai kebutuhan */
     }
 </style>
 <main class="main">
     <div class="logo-container">
         <img class="logo-jenis-tatib" src="<?= BASEURL ?>/img/jenis.svg" alt="Jenis Logo">
         <p class="Text-judul">Tata Tertib Mahasiswa</p>
     </div>


     <div class="border-tatib">
         <form action="<?= BASEURL ?>/mahasiswa/tingkat" method="POST">
             <button name="page" value="1" type="submit" class="box-tatib">
                 <p>
                 <h1 class="text-tatib">
                     Pelanggaran Tingkat 1
                 </h1>
             </button>

             <button name="page" value="2" type="submit" class="box-tatib">
                 <p>
                 <h1 class="text-tatib">
                     Pelanggaran Tingkat 2
                 </h1>
             </button>

              <button name="page" value="3" type="submit" class="box-tatib">
                 <p>
                 <h1 class="text-tatib">
                     Pelanggaran Tingkat 3
                 </h1>
                 </button>

                 <button name="page" value="4" type="submit" class="box-tatib">
                     <p>
                     <h1 class="text-tatib">
                         Pelanggaran Tingkat 4
                     </h1>
                 </button>
                 <button name="page" value="5" type="submit" class="box-tatib">
                     <p>
                     <h1 class="text-tatib">
                         Pelanggaran Tingkat 5
                     </h1>
                 </button>
         </form>
     </div>
 </main>
 </div>
 </div>