<body>
<div class="container-header-admin">
	<div class="row-admin">
		<div class="header-container-admin">
			<div class="header-content-admin">
				<a class="header-title">
					<img src="<?=BASEURL?>/img/logo_polinema.png" width="70px" alt="">
					POLITEKNIK NEGERI MALANG
				</a>
			</div>
			<div class="profile">
                    <button type="button" class="btn">
                        <a href="<?=BASEURL?>/Authorization/index" class="profile-title">Log In</a>
                    </button>
			</div>
		</div>
	</div>
</div>

<div class="container">
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
			</div>
		<?php endforeach; ?>
	</div>
</div>