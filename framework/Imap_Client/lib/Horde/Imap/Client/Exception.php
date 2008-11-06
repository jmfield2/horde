<?php
/**
 * Exception handler for the Horde_Imap_Client class.
 *
 * Copyright 2008 The Horde Project (http://www.horde.org/)
 *
 * $Horde: framework/Imap_Client/lib/Horde/Imap/Client/Exception.php,v 1.16 2008/10/23 04:53:13 slusarz Exp $
 *
 * See the enclosed file COPYING for license information (LGPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
 *
 * @author   Michael Slusarz <slusarz@curecanti.org>
 * @category Horde
 * @package  Horde_Imap_Client
 */
class Horde_Imap_Client_Exception extends Exception
{
    /* Error message codes. */
    // Unspecified error (default)
    const UNSPECIFIED = 0;

    // The given Horde_Imap_Client driver does not exist on the system.
    const DRIVER_NOT_FOUND = 1;

    // The function called is not supported in POP3.
    const POP3_NOTSUPPORTED = 2;

    // There was an unrecoverable error in UTF7IMAP -> UTF8 conversion.
    const UTF7IMAP_CONVERSION = 3;

    // The IMAP server sent ended the connection.
    const IMAP_DISCONNECT = 4;

    // The charset used in the search query is not supported on the server.
    const BADCHARSET = 5;

    // There were errors parsing the MIME/RFC 2822 header of the part.
    const PARSEERROR = 6;

    // The server could not decode the MIME part (see RFC 3516)
    const UNKNOWNCTE = 7;

    // The server does not support the IMAP extensions needed for this
    // operation
    const NOSUPPORTIMAPEXT = 8;

    // The comparator specified by setComparator() was not recognized by the
    // IMAP server
    const BADCOMPARATOR = 9;

    // RFC 4551 [3.1.2] - All mailboxes are not required to support
    // mod-sequences.
    const MBOXNOMODSEQ = 10;

    // Thrown if the cache has become invalid.
    const CACHEUIDINVALID = 11;
}
