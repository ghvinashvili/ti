<?php

/**
 * @file
 * Contains Drupal\ti\Form\TiForm.
 */

namespace Drupal\ti\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\field_collection\Entity\FieldCollection;
use Drupal\views\Plugin\views\field\Field;

/**
 * Class TiForm.
 *
 * @package Drupal\ti\Form
 */
class TiForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'ti.ti',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'ti_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('ti.ti');

    $form['field_machine_lable_name'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Enter Field Collection machine names'),
      '#default_value' => $config->get('enter_taxonomy_field_machine_lable_name'),
    ];

    $form['field_machine_name'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Enter Taxonomy field machine names'),
      '#default_value' => $config->get('enter_taxonomy_field_machine_name'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);


    $this->config('ti.ti')
      ->set('enter_taxonomy_field_machine_name', $form_state->getValue('field_machine_name'))
      ->set('enter_taxonomy_field_machine_lable_name', $form_state->getValue('field_machine_lable_name'))
      ->save();


  }

}
