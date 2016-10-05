<? if (!empty($this->session->userdata['POST_Step_1'])):?>
<p><span class="inform_text">Кол-во характерных точек:</span> <?=$this->session->userdata['POST_Step_1']['pointsQty'];?></p>
<? endif; ?>

<? if (!empty($this->session->userdata['POST_Step_2'])):?>
<p><span class="inform_text">Длины участков:</span><br />
<?php for ($i=1;$i<=($this->session->userdata['POST_Step_1']['pointsQty']-1);$i++): ?>
L<?=$i?> = <?=$this->session->userdata['POST_Step_2']["partLenght_$i"]?> м. <br />
<?php endfor; ?>
</p>
<? endif; ?>

<? if (!empty($this->session->userdata['mainstayNoMoving'])):?>
<p><span class="inform_text">Шарнирно-неподвижная опора в точке</span> <?=$this->session->userdata['mainstayNoMoving']['joint']?></p>
<p><span class="inform_text">Шарнирно-подвижная опора в точке</span> <?=$this->session->userdata['mainstayMoving']['joint']?></p>
<? endif; ?>

<? if (!empty($this->session->userdata['pointEnergy'])):?>
<p><span class="inform_text">Сосредоточенные нагрузки </span><br/>
<?php foreach ($this->session->userdata['pointEnergy'] as $key=>$value): ?>
F<?=$key?> = <?=$value['value']?> кН., в точке <?=$value['joint']?><br />
<?php endforeach; ?>
</p>
<? endif; ?>

<? if (!empty($this->session->userdata['moment'])):?>
<p><span class="inform_text">Изгибающие моменты:  </span><br/>
<?php foreach ($this->session->userdata['moment'] as $key=>$value): ?>
M<?=$key?> = <?=$value['value']?> кН*м., в точке <?=$value['joint']?><br />
<?php endforeach; ?>
</p>
<? endif; ?>

<? if (!empty($this->session->userdata['load'])):?>
<p><span class="inform_text">Распределенные нагрузки: </span><br />
<?php foreach ($this->session->userdata['load'] as $key=>$value): ?>
q<?=$key?> = <?=$value['value']?> кН/м., между точек <?=$value['joint'].' - '.($value['joint']+1)?><br />
<?php endforeach; ?>
</p>
<? endif; ?>