<?php

namespace models;

interface IGetterHistory
{
	public function getHistory($additionalData= null): array;
}