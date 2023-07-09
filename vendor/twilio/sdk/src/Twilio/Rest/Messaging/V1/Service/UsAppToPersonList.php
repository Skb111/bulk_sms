<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Messaging
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Twilio\Rest\Messaging\V1\Service;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Stream;
use Twilio\Values;
use Twilio\Version;
use Twilio\Serialize;


class UsAppToPersonList extends ListResource
    {
    /**
     * Construct the UsAppToPersonList
     *
     * @param Version $version Version that contains the resource
     * @param string $messagingServiceSid The SID of the [Messaging Service](https://www.twilio.com/docs/messaging/services/api) to create the resources from.
     */
    public function __construct(
        Version $version,
        string $messagingServiceSid
    ) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [
        'messagingServiceSid' =>
            $messagingServiceSid,
        
        ];

        $this->uri = '/Services/' . \rawurlencode($messagingServiceSid)
        .'/Compliance/Usa2p';
    }

    /**
     * Create the UsAppToPersonInstance
     *
     * @param string $brandRegistrationSid A2P Brand Registration SID
     * @param string $description A short description of what this SMS campaign does. Min length: 40 characters. Max length: 4096 characters.
     * @param string $messageFlow Required for all Campaigns. Details around how a consumer opts-in to their campaign, therefore giving consent to receive their messages. If multiple opt-in methods can be used for the same campaign, they must all be listed. 40 character minimum. 2048 character maximum.
     * @param string[] $messageSamples Message samples, at least 1 and up to 5 sample messages (at least 2 for sole proprietor), >=20 chars, <=1024 chars each.
     * @param string $usAppToPersonUsecase A2P Campaign Use Case. Examples: [ 2FA, EMERGENCY, MARKETING..]
     * @param bool $hasEmbeddedLinks Indicates that this SMS campaign will send messages that contain links.
     * @param bool $hasEmbeddedPhone Indicates that this SMS campaign will send messages that contain phone numbers.
     * @param array|Options $options Optional Arguments
     * @return UsAppToPersonInstance Created UsAppToPersonInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(string $brandRegistrationSid, string $description, string $messageFlow, array $messageSamples, string $usAppToPersonUsecase, bool $hasEmbeddedLinks, bool $hasEmbeddedPhone, array $options = []): UsAppToPersonInstance
    {

        $options = new Values($options);

        $data = Values::of([
            'BrandRegistrationSid' =>
                $brandRegistrationSid,
            'Description' =>
                $description,
            'MessageFlow' =>
                $messageFlow,
            'MessageSamples' =>
                Serialize::map($messageSamples,function ($e) { return $e; }),
            'UsAppToPersonUsecase' =>
                $usAppToPersonUsecase,
            'HasEmbeddedLinks' =>
                Serialize::booleanToString($hasEmbeddedLinks),
            'HasEmbeddedPhone' =>
                Serialize::booleanToString($hasEmbeddedPhone),
            'OptInMessage' =>
                $options['optInMessage'],
            'OptOutMessage' =>
                $options['optOutMessage'],
            'HelpMessage' =>
                $options['helpMessage'],
            'OptInKeywords' =>
                Serialize::map($options['optInKeywords'], function ($e) { return $e; }),
            'OptOutKeywords' =>
                Serialize::map($options['optOutKeywords'], function ($e) { return $e; }),
            'HelpKeywords' =>
                Serialize::map($options['helpKeywords'], function ($e) { return $e; }),
        ]);

        $payload = $this->version->create('POST', $this->uri, [], $data);

        return new UsAppToPersonInstance(
            $this->version,
            $payload,
            $this->solution['messagingServiceSid']
        );
    }


    /**
     * Reads UsAppToPersonInstance records from the API as a list.
     * Unlike stream(), this operation is eager and will load `limit` records into
     * memory before returning.
     *
     * @param int $limit Upper limit for the number of records to return. read()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, read()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return UsAppToPersonInstance[] Array of results
     */
    public function read(int $limit = null, $pageSize = null): array
    {
        return \iterator_to_array($this->stream($limit, $pageSize), false);
    }

    /**
     * Streams UsAppToPersonInstance records from the API as a generator stream.
     * This operation lazily loads records as efficiently as possible until the
     * limit
     * is reached.
     * The results are returned as a generator, so this operation is memory
     * efficient.
     *
     * @param int $limit Upper limit for the number of records to return. stream()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, stream()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return Stream stream of results
     */
    public function stream(int $limit = null, $pageSize = null): Stream
    {
        $limits = $this->version->readLimits($limit, $pageSize);

        $page = $this->page($limits['pageSize']);

        return $this->version->stream($page, $limits['limit'], $limits['pageLimit']);
    }

    /**
     * Retrieve a single page of UsAppToPersonInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return UsAppToPersonPage Page of UsAppToPersonInstance
     */
    public function page(
        $pageSize = Values::NONE,
        string $pageToken = Values::NONE,
        $pageNumber = Values::NONE
    ): UsAppToPersonPage
    {

        $params = Values::of([
            'PageToken' => $pageToken,
            'Page' => $pageNumber,
            'PageSize' => $pageSize,
        ]);

        $response = $this->version->page('GET', $this->uri, $params);

        return new UsAppToPersonPage($this->version, $response, $this->solution);
    }

    /**
     * Retrieve a specific page of UsAppToPersonInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return UsAppToPersonPage Page of UsAppToPersonInstance
     */
    public function getPage(string $targetUrl): UsAppToPersonPage
    {
        $response = $this->version->getDomain()->getClient()->request(
            'GET',
            $targetUrl
        );

        return new UsAppToPersonPage($this->version, $response, $this->solution);
    }


    /**
     * Constructs a UsAppToPersonContext
     *
     * @param string $sid The SID of the US A2P Compliance resource to delete `QE2c6890da8086d771620e9b13fadeba0b`.
     */
    public function getContext(
        string $sid
        
    ): UsAppToPersonContext
    {
        return new UsAppToPersonContext(
            $this->version,
            $this->solution['messagingServiceSid'],
            $sid
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        return '[Twilio.Messaging.V1.UsAppToPersonList]';
    }
}
