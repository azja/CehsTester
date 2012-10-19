<?php
interface IContext
{
 
 /**
 * Function Description
 * @no parameter
 * @returns data base adress for current context as string value
 */
 function getDbAdress ( );

 /**
 * Function Description
 * @no parameter
 * @returns data base name for current context as string value
 */
 function getDbName ( );
 
  /**
 * Function Description
 * @no parameter
 * @returns data base user name for current context as string value
 */
 function getDbUsername ( );
 
  /**
 * Function Description
 * @no parameter
 * @returns data base password for current context as string value
 */
 function getDbPassword ( );

 /**
 * Function Description
 * @no parameter
 * @returns array of db names used in particular context
 */

 function getDbTableNames ( );
 
  /**
 * Function Description
 * @no parameter
 * @returns ILogger object for logging purposes
 */

 function Logger ( );
}

?>
