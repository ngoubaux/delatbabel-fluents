<?php
/**
 * Trait Fluents
 */
namespace Delatbabel\Fluents;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Contracts\Encryption\EncryptException;
use Illuminate\Support\Fluent;

/**
 * Trait Fluents
 *
 * Laravel extension to convert to/from Fluent objects.
 *
 * ### Rationale
 *
 * The Laravel Fluent object is one of the most under-rated and under-utilized components of the
 * framework. Essentially a free-standing object, it allows you to access an array of attributes
 * as an object rather than as an array.
 *
 * Until now, however, there has been no standard straightforwards way to convert an Eloquent
 * Model object into a Fluent object. There is a toArray() function on a Model object but
 * no equivalent toFluent() function.
 *
 * This component adds such functions using a trait that can be applied to any model object.
 * Note that several other of Laravel's internal classes can also have this trait applied,
 * as long as they store their data in an internal `attributes` array this trait should
 * work.
 *
 * ### Example
 *
 * <code>
 *   use Delatbabel\Fluents\Fluents;
 *
 *   class User extends Eloquent {
 *       use Fluents;
 *   }
 *
 *   $myFluent = new Fluent();
 *   $myFluent->first = 'one';
 *
 *   $myUser = new User();
 *   $myUser->fill($myFluent);
 * </code>
 *
 * @link http://laravel.com/api/5.1/Illuminate/Support/Fluent.html
 */
trait Fluents
{

    /**
     * Convert the instance to a Fluent object.
     *
     * @return Fluent
     */
    public function toFluent()
    {
        return new Fluent($this->toArray());
    }

    /**
     * Fill the model with attributes from the object or from the array.
     *
     * @param  mixed  $attributes
     * @return $this
     *
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */

    public function fill($attributes)
    {
        if (is_array($attributes)) {
            return parent::fill($attributes);
        }
        return parent::fill($attributes->toArray());
    }
}
