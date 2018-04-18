Feature: Create media relay sets
  In order to manage media relay sets
  As an super admin
  I need to be able to create them through the API.

  @createSchema
  Scenario: Create a media relay set
    Given I add Authorization header
     When I add "Content-Type" header equal to "application/json"
      And I add "Accept" header equal to "application/json"
      And I send a "POST" request to "/media_relay_sets" with body:
    """
      {
          "name": "New",
          "description": "New media relay set"
      }
    """
    Then the response status code should be 201
     And the response should be in JSON
     And the header "Content-Type" should be equal to "application/json; charset=utf-8"
     And the JSON should be equal to:
    """
       {
          "name": "New",
          "description": "New media relay set",
          "type": "rtpproxy",
          "id": 3
      }
    """

  Scenario: Retrieve created media relay set
    Given I add Authorization header
     When I add "Accept" header equal to "application/json"
      And I send a "GET" request to "media_relay_sets/3"
     Then the response status code should be 200
      And the response should be in JSON
      And the header "Content-Type" should be equal to "application/json; charset=utf-8"
      And the JSON should be equal to:
    """
       {
          "name": "New",
          "description": "New media relay set",
          "type": "rtpproxy",
          "id": 3
      }
    """
