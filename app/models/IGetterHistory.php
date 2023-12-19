<?php

namespace models;

interface IGetterHistory
{
	public function getAllHistory($additionalData= null): array;

	public function getHistoryById($additionalData = null): array;
}