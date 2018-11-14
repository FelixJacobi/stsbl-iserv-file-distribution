<?php
// src/Stsbl/FileDistributionBundle/Crud/Batch/Traits/NoopFormTrait.php
namespace Stsbl\FileDistributionBundle\Crud\Batch\Traits;

use Symfony\Component\Form\FormInterface;

/*
 * The MIT License
 *
 * Copyright 2018 Felix Jacobi.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

/**
 * Pseudo implementation for `FormExtendingBatchActionInterface`
 *
 * @author Felix Jacobi <felix.jacobi@stsbl.de>
 * @license MIT license <https://opensource.org/licenses/MIT>
 */
trait NoopFormTrait 
{
    /**
     * Allows the batch action to manipulate the form.
     *
     * This is called at the end of `prepareBatchActions`.
     *
     * @param FormInterface $form
     */
    public function finalizeForm(FormInterface $form)
    {
        // bypass
    }
    
    /**
     * Gets called with the full form data instead of `execute`.
     *
     * @param array $data
     */
    public function handleFormData(array $data)
    {
        // bypass
        return $this->execute($data['multi']);
    }
}
