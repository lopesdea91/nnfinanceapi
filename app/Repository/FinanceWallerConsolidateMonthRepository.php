<?php

namespace App\Repository;

use App\Models\FinanceWalletConsolidateMonthModel;
use App\Repository\Base\CrudRepository;

class FinanceWallerConsolidateMonthRepository extends CrudRepository
{
  protected $model;
  // protected $fields = ['id', 'description', 'json', 'enable', 'panel', 'user_id'];
  // protected $relationships = ['user'];

  public function __construct()
  {
    $this->model = new FinanceWalletConsolidateMonthModel;
  }

  public function createOrUpdate($where, $data)
  {
    $exist = $this->model::where($where)->first();

    $fields = [
      'year'      => $data['year'],
      'month'     => $data['month'],
      'wallet_id' => $data['wallet_id'],
      "balance"   => json_encode($data["balance"]),
      "composition" => json_encode($data["composition"]),
      "originTransactional" => json_encode($data["originTransactional"]),
      "invoice"   => json_encode($data["invoice"]),
      "tag"       => json_encode($data["tag"]),
      "status"    => json_encode($data["status"]),
    ];

    $exist ? $this->model::where($where)->update($fields) : $this->model->create($fields);
  }
}
