<link rel="stylesheet" href="<?= BASEURL?>/css/tatib_dosen.css">
<div class= "tabel">
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
<!--		<div class="accordion-item rounded-3">-->
<!--			<h2 class="accordion-header">-->
<!--				<button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse"-->
<!--				        data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">-->
<!--					Pelanggaran Tingkat 2-->
<!--				</button>-->
<!--			</h2>-->
<!--			<div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">-->
<!--				<div class="accordion-body">-->
<!--					<ol class="list-group list-group-numbered">-->
<!--						<li class="list-group-item"> Mengancam, baik tertulis atau tidak tertulis kepada mahasiswa,-->
<!--							dosen, dan/atau karyawan.</li>-->
<!--						<li class="list-group-item"> Melakukan penyalahgunaan identitas untuk perbuatan negatif</li>-->
<!--						<li class="list-group-item"> Melakukan tindakan kekerasan atau perkelahian di dalam kampus. </li>-->
<!--						<li class="list-group-item"> Melakukan kegiatan politik praktis di dalam kampus</li>-->
<!--						<li class="list-group-item"> Melakukan perkelahian, serta membentuk geng/ kelompok yang-->
<!--							bertujuan negatif.</li>-->
<!--						<li class="list-group-item">A list item</li>-->
<!--						<li class="list-group-item">A list item</li>-->
<!--						<li class="list-group-item">A list item</li>-->
<!--						<li class="list-group-item">A list item</li>-->
<!--					</ol>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--		<div class="accordion-item rounded-3">-->
<!--			<h2 class="accordion-header">-->
<!--				<button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse"-->
<!--				        data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">-->
<!--					Pelanggaran Tingkat 3-->
<!--				</button>-->
<!--			</h2>-->
<!--			<div id="flush-collapseThree" class="accordion-collapse collapse"-->
<!--			     data-bs-parent="#accordionFlushExample">-->
<!--				<div class="accordion-body">-->
<!--					<ol class="list-group list-group-numbered">-->
<!--						<li class="list-group-item">A list item</li>-->
<!--						<li class="list-group-item">A list item</li>-->
<!--						<li class="list-group-item">A list item</li>-->
<!--					</ol>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--		<div class="accordion-item rounded-3">-->
<!--			<h2 class="accordion-header">-->
<!--				<button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse"-->
<!--				        data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseThree">-->
<!--					Pelanggaran Tingkat 4-->
<!--				</button>-->
<!--			</h2>-->
<!--			<div id="flush-collapseFour" class="accordion-collapse collapse"-->
<!--			     data-bs-parent="#accordionFlushExample">-->
<!--				<div class="accordion-body">-->
<!--					<ol class="list-group list-group-numbered">-->
<!--						<li class="list-group-item">A list item</li>-->
<!--						<li class="list-group-item">A list item</li>-->
<!--						<li class="list-group-item">A list item</li>-->
<!--					</ol>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--		<div class="accordion-item rounded-3">-->
<!--			<h2 class="accordion-header">-->
<!--				<button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse"-->
<!--				        data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseThree">-->
<!--					Pelanggaran Tingkat 5-->
<!--				</button>-->
<!--			</h2>-->
<!--			<div id="flush-collapseFive" class="accordion-collapse collapse"-->
<!--			     data-bs-parent="#accordionFlushExample">-->
<!--				<div class="accordion-body">-->
<!--					<ol class="list-group list-group-numbered">-->
<!--						<li class="list-group-item">Berkomunikasi Tidak Sopan</li>-->
<!--					</ol>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
	</div>
</div>
</div>
