<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Aiplatform;

class GoogleCloudAiplatformV1CountTokensRequest extends \Google\Collection
{
  protected $collection_key = 'instances';
  /**
   * @var GoogleCloudAiplatformV1Content[]
   */
  public $contents;
  protected $contentsType = GoogleCloudAiplatformV1Content::class;
  protected $contentsDataType = 'array';
  /**
   * @var array[]
   */
  public $instances;
  /**
   * @var string
   */
  public $model;

  /**
   * @param GoogleCloudAiplatformV1Content[]
   */
  public function setContents($contents)
  {
    $this->contents = $contents;
  }
  /**
   * @return GoogleCloudAiplatformV1Content[]
   */
  public function getContents()
  {
    return $this->contents;
  }
  /**
   * @param array[]
   */
  public function setInstances($instances)
  {
    $this->instances = $instances;
  }
  /**
   * @return array[]
   */
  public function getInstances()
  {
    return $this->instances;
  }
  /**
   * @param string
   */
  public function setModel($model)
  {
    $this->model = $model;
  }
  /**
   * @return string
   */
  public function getModel()
  {
    return $this->model;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudAiplatformV1CountTokensRequest::class, 'Google_Service_Aiplatform_GoogleCloudAiplatformV1CountTokensRequest');
