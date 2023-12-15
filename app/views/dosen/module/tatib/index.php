<style>
    .container-tatib {
        width: 80%;
        margin-left: 20%;
        /* Ganti nilai 20% sesuai kebutuhan */
    }
</style>


<div class="main col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container-tatib">
        <h3>TINGKAT PELANGGARAN</h3>
        <div class="accordion accordion-flush" id="accordionFlushExample">
			<?php $id = 1;
			foreach ($data['tingkat'] as $level) :?>
            <div class="accordion-item rounded-3">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse<?=$id?>" aria-expanded="false" aria-controls="flush-collapseOne">
						<?= $level["tingkatan"];?>
                    </button>
                </h2>
                <div id="flush-collapse<?=$id?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ol class="list-group list-group-numbered">
							<?php foreach ($data['jenis'][$level['tingkatan']] as $elm) :?>
                                <li class="list-group-item">
									<?=$elm['jenis']?>
                                </li>
							<?php endforeach; $id++;?>
                        </ol>
                    </div>
                </div>
				<?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
