<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 2/10/15
 * Time: 6:17 PM
 */


/* The FileException class.
 * The class creates one new method: getDetails().
 */
class FileException extends Exception {

  // For returning more detailed error messages:
  function getDetails() {

    // Return a different message based upon the code:
    switch ($this->code) {
      case 0:
        return 'No filename was provided';
        break;
      case 1:
        return 'The file does not exist.';
        break;
      case 2:
        return 'The file is not a file.';
        break;
      case 3:
        return 'The file is not writable.';
        break;
      case 4:
        return 'An invalid mode was provided.';
        break;
      case 5:
        return 'The data could not be written.';
        break;
      case 6:
        return 'The file could not be closed.';
        break;
      default:
        return 'No further information is available.';
        break;
    }

  }

}