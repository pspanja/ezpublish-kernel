<?php

/**
 * File containing the RoleService class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace eZ\Publish\Core\REST\Client;

use eZ\Publish\API\Repository\RoleService as APIRoleService;
use eZ\Publish\API\Repository\Values\User\Limitation\RoleLimitation;
use eZ\Publish\API\Repository\Values\User\Policy as APIPolicy;
use eZ\Publish\API\Repository\Values\User\PolicyCreateStruct as APIPolicyCreateStruct;
use eZ\Publish\API\Repository\Values\User\PolicyDraft;
use eZ\Publish\API\Repository\Values\User\PolicyUpdateStruct as APIPolicyUpdateStruct;
use eZ\Publish\API\Repository\Values\User\Role as APIRole;
use eZ\Publish\API\Repository\Values\User\RoleAssignment as APIRoleAssignment;
use eZ\Publish\API\Repository\Values\User\RoleDraft as APIRoleDraft;
use eZ\Publish\API\Repository\Values\User\RoleCreateStruct as APIRoleCreateStruct;
use eZ\Publish\API\Repository\Values\User\RoleUpdateStruct;
use eZ\Publish\API\Repository\Values\User\User;
use eZ\Publish\API\Repository\Values\User\UserGroup;
use eZ\Publish\Core\Repository\Values\User\RoleDraft;
use eZ\Publish\Core\Repository\Values\User\UserRoleAssignment;
use eZ\Publish\Core\Repository\Values\User\UserGroupRoleAssignment;
use eZ\Publish\Core\REST\Client\Values\User\PolicyCreateStruct;
use eZ\Publish\Core\REST\Client\Values\User\PolicyUpdateStruct;
use eZ\Publish\Core\REST\Client\Values\User\Role;
use eZ\Publish\Core\REST\Client\Values\User\Policy;
use eZ\Publish\Core\REST\Client\Values\User\RoleAssignment;
use eZ\Publish\Core\REST\Common\RequestParser;
use eZ\Publish\Core\REST\Common\Input\Dispatcher;
use eZ\Publish\Core\REST\Common\Output\Visitor;
use eZ\Publish\Core\REST\Common\Message;

/**
 * Implementation of the {@link \eZ\Publish\API\Repository\RoleService}
 * interface.
 *
 * @see \eZ\Publish\API\Repository\RoleService
 */
class RoleService implements APIRoleService, Sessionable
{
    /**
     * @var \eZ\Publish\Core\REST\Client\UserService
     */
    private $userService;

    /**
     * @var \eZ\Publish\Core\REST\Client\HttpClient
     */
    private $client;

    /**
     * @var \eZ\Publish\Core\REST\Common\Input\Dispatcher
     */
    private $inputDispatcher;

    /**
     * @var \eZ\Publish\Core\REST\Common\Output\Visitor
     */
    private $outputVisitor;

    /**
     * @var \eZ\Publish\Core\REST\Common\RequestParser
     */
    private $requestParser;

    /**
     * @param \eZ\Publish\Core\REST\Client\UserService $userService
     * @param \eZ\Publish\Core\REST\Client\HttpClient $client
     * @param \eZ\Publish\Core\REST\Common\Input\Dispatcher $inputDispatcher
     * @param \eZ\Publish\Core\REST\Common\Output\Visitor $outputVisitor
     * @param \eZ\Publish\Core\REST\Common\RequestParser $requestParser
     */
    public function __construct(UserService $userService, HttpClient $client, Dispatcher $inputDispatcher, Visitor $outputVisitor, RequestParser $requestParser)
    {
        $this->userService = $userService;
        $this->client = $client;
        $this->inputDispatcher = $inputDispatcher;
        $this->outputVisitor = $outputVisitor;
        $this->requestParser = $requestParser;
    }

    /**
     * Set session ID.
     *
     * Only for testing
     *
     * @param mixed $id
     *
     * @private
     */
    public function setSession($id)
    {
        if ($this->outputVisitor instanceof Sessionable) {
            $this->outputVisitor->setSession($id);
        }
    }

    /**
     * Creates a new RoleDraft for existing Role.
     *
     * @since 6.0
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\UnauthorizedException if the authenticated user is not allowed to create a role
     * @throws \eZ\Publish\API\Repository\Exceptions\InvalidArgumentException if the Role already has a Role Draft that will need to be removed first
     * @throws \eZ\Publish\API\Repository\Exceptions\LimitationValidationException if a policy limitation in the $roleCreateStruct is not valid
     *
     * @param \eZ\Publish\API\Repository\Values\User\Role $role
     *
     * @return \eZ\Publish\API\Repository\Values\User\RoleDraft
     */
    public function createRoleDraft(APIRole $role)
    {
        //TODO
    }

    /**
     * Loads a role for the given id.
     *
     * @since 6.0
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\UnauthorizedException if the authenticated user is not allowed to read this role
     * @throws \eZ\Publish\API\Repository\Exceptions\NotFoundException if a role with the given id was not found
     *
     * @param mixed $id
     *
     * @return \eZ\Publish\API\Repository\Values\User\RoleDraft
     */
    public function loadRoleDraft($id)
    {
        //TODO
    }

    /**
     * Loads a RoleDraft by the ID of the role it was created from.
     *
     * @param mixed $roleId ID of the role the draft was created from.
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\UnauthorizedException if the authenticated user is not allowed to read this role
     * @throws \eZ\Publish\API\Repository\Exceptions\NotFoundException if a RoleDraft with the given id was not found
     *
     * @return \eZ\Publish\API\Repository\Values\User\RoleDraft
     */
    public function loadRoleDraftByRoleId($roleId)
    {
        // TODO
    }

    /**
     * Updates the properties of a role draft.
     *
     * @since 6.0
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\UnauthorizedException if the authenticated user is not allowed to update a role
     * @throws \eZ\Publish\API\Repository\Exceptions\InvalidArgumentException if the identifier of the role already exists
     *
     * @param \eZ\Publish\API\Repository\Values\User\RoleDraft $roleDraft
     * @param \eZ\Publish\API\Repository\Values\User\RoleUpdateStruct $roleUpdateStruct
     *
     * @return \eZ\Publish\API\Repository\Values\User\RoleDraft
     */
    public function updateRoleDraft(APIRoleDraft $roleDraft, RoleUpdateStruct $roleUpdateStruct)
    {
        //TODO
    }

    /**
     * Adds a new policy to the role draft.
     *
     * @since 6.0
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\UnauthorizedException if the authenticated user is not allowed to add  a policy
     * @throws \eZ\Publish\API\Repository\Exceptions\InvalidArgumentException if limitation of the same type is repeated in policy create
     *                                                                        struct or if limitation is not allowed on module/function
     * @throws \eZ\Publish\API\Repository\Exceptions\LimitationValidationException if a limitation in the $policyCreateStruct is not valid
     *
     * @param \eZ\Publish\API\Repository\Values\User\RoleDraft $roleDraft
     * @param \eZ\Publish\API\Repository\Values\User\PolicyCreateStruct $policyCreateStruct
     *
     * @return \eZ\Publish\API\Repository\Values\User\RoleDraft
     */
    public function addPolicyByRoleDraft(APIRoleDraft $roleDraft, APIPolicyCreateStruct $policyCreateStruct)
    {
        //TODO
    }

    /**
     * Removes a policy from a role draft.
     *
     * @since 6.0
     *
     *
     * @param \eZ\Publish\API\Repository\Values\User\RoleDraft $roleDraft
     * @param PolicyDraft $policyDraft the policy to remove from the role
     * @return APIRoleDraft if the authenticated user is not allowed to remove a policy
     */
    public function removePolicyByRoleDraft(APIRoleDraft $roleDraft, PolicyDraft $policyDraft)
    {
        //TODO
    }

    /**
     * Updates the limitations of a policy. The module and function cannot be changed and
     * the limitations are replaced by the ones in $roleUpdateStruct.
     *
     * @since 6.0
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\UnauthorizedException if the authenticated user is not allowed to update a policy
     * @throws \eZ\Publish\API\Repository\Exceptions\InvalidArgumentException if limitation of the same type is repeated in policy update
     *                                                                        struct or if limitation is not allowed on module/function
     * @throws \eZ\Publish\API\Repository\Exceptions\LimitationValidationException if a limitation in the $policyUpdateStruct is not valid
     *
     * @param \eZ\Publish\API\Repository\Values\User\RoleDraft $roleDraft
     * @param \eZ\Publish\API\Repository\Values\User\PolicyDraft $policy
     * @param \eZ\Publish\API\Repository\Values\User\PolicyUpdateStruct $policyUpdateStruct
     *
     * @return \eZ\Publish\API\Repository\Values\User\PolicyDraft
     */
    public function updatePolicyByRoleDraft(APIRoleDraft $roleDraft, PolicyDraft $policy, APIPolicyUpdateStruct $policyUpdateStruct)
    {
        //TODO
    }

    /**
     * Deletes the given role.
     *
     * @since 6.0
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\UnauthorizedException if the authenticated user is not allowed to delete this role
     *
     * @param \eZ\Publish\API\Repository\Values\User\RoleDraft $roleDraft
     */
    public function deleteRoleDraft(APIRoleDraft $roleDraft)
    {
        //TODO
    }

    /**
     * Publishes a given Role draft.
     *
     * @since 6.0
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\UnauthorizedException if the authenticated user is not allowed to delete this role
     *
     * @param \eZ\Publish\API\Repository\Values\User\RoleDraft $roleDraft
     */
    public function publishRoleDraft(APIRoleDraft $roleDraft)
    {
        //TODO
    }

    /**
     * Creates a new Role draft.
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\UnauthorizedException if the authenticated user is not allowed to create a role
     * @throws \eZ\Publish\API\Repository\Exceptions\InvalidArgumentException if the name of the role already exists or if limitation of the
     *                                                                        same type is repeated in the policy create struct or if
     *                                                                        limitation is not allowed on module/function
     * @throws \eZ\Publish\API\Repository\Exceptions\LimitationValidationException if a policy limitation in the $roleCreateStruct is not valid
     *
     * @param \eZ\Publish\API\Repository\Values\User\RoleCreateStruct $roleCreateStruct
     *
     * @return \eZ\Publish\API\Repository\Values\User\RoleDraft
     */
    public function createRole(APIRoleCreateStruct $roleCreateStruct)
    {
        $inputMessage = $this->outputVisitor->visit($roleCreateStruct);
        $inputMessage->headers['Accept'] = $this->outputVisitor->getMediaType('Role');

        $result = $this->client->request(
            'POST',
            $this->requestParser->generate('roles'),
            $inputMessage
        );

        $createdRole = $this->inputDispatcher->parse($result);
        $createdRoleValues = $this->requestParser->parse('role', $createdRole->id);

        $createdPolicies = array();
        foreach ($roleCreateStruct->getPolicies() as $policyCreateStruct) {
            $inputMessage = $this->outputVisitor->visit($policyCreateStruct);
            $inputMessage->headers['Accept'] = $this->outputVisitor->getMediaType('Policy');

            $result = $this->client->request(
                'POST',
                $this->requestParser->generate('policies', array('role' => $createdRoleValues['role'])),
                $inputMessage
            );

            $createdPolicy = $this->inputDispatcher->parse($result);

            // @todo Workaround for missing roleId in Policy XSD definition
            $createdPolicyArray = array(
                'id' => $createdPolicy->id,
                'roleId' => $createdRole->id,
                'module' => $createdPolicy->module,
                'function' => $createdPolicy->function,
            );

            $createdPolicy = new Policy($createdPolicyArray);
            $createdPolicies[] = $createdPolicy;
        }

        return new RoleDraft(
            array(
                'id' => $createdRole->id,
                'identifier' => $createdRole->identifier,
            ),
            $createdPolicies
        );
    }

    /**
     * Updates the name of the role.
     *
     * @deprecated since 6.0, use {@see updateRoleDraft}
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\UnauthorizedException if the authenticated user is not allowed to update a role
     * @throws \eZ\Publish\API\Repository\Exceptions\InvalidArgumentException if the name of the role already exists
     *
     * @param \eZ\Publish\API\Repository\Values\User\Role $role
     * @param \eZ\Publish\API\Repository\Values\User\RoleUpdateStruct $roleUpdateStruct
     *
     * @return \eZ\Publish\API\Repository\Values\User\Role
     */
    public function updateRole(APIRole $role, RoleUpdateStruct $roleUpdateStruct)
    {
        $inputMessage = $this->outputVisitor->visit($roleUpdateStruct);
        $inputMessage->headers['Accept'] = $this->outputVisitor->getMediaType('Role');
        $inputMessage->headers['X-HTTP-Method-Override'] = 'PATCH';

        $result = $this->client->request(
            'POST',
            $role->id,
            $inputMessage
        );

        return $this->inputDispatcher->parse($result);
    }

    /**
     * Adds a new policy to the role.
     *
     * @deprecated since 6.0, use {@see addPolicyByRoleDraft}
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\UnauthorizedException if the authenticated user is not allowed to add  a policy
     * @throws \eZ\Publish\API\Repository\Exceptions\InvalidArgumentException if limitation of the same type is repeated in policy create
     *                                                                        struct or if limitation is not allowed on module/function
     * @throws \eZ\Publish\API\Repository\Exceptions\LimitationValidationException if a limitation in the $policyCreateStruct is not valid
     *
     * @param \eZ\Publish\API\Repository\Values\User\Role $role
     * @param \eZ\Publish\API\Repository\Values\User\PolicyCreateStruct $policyCreateStruct
     *
     * @return \eZ\Publish\API\Repository\Values\User\Role
     */
    public function addPolicy(APIRole $role, APIPolicyCreateStruct $policyCreateStruct)
    {
        $values = $this->requestParser->parse('role', $role->id);
        $inputMessage = $this->outputVisitor->visit($policyCreateStruct);
        $inputMessage->headers['Accept'] = $this->outputVisitor->getMediaType('Policy');

        $result = $this->client->request(
            'POST',
            $this->requestParser->generate('policies', array('role' => $values['role'])),
            $inputMessage
        );

        $createdPolicy = $this->inputDispatcher->parse($result);

        // @todo Workaround for missing roleId in Policy XSD definition
        $createdPolicyArray = array(
            'id' => $createdPolicy->id,
            'roleId' => $role->id,
            'module' => $createdPolicy->module,
            'function' => $createdPolicy->function,
        );

        $createdPolicy = new Policy($createdPolicyArray);

        $existingPolicies = $role->getPolicies();
        $existingPolicies[] = $createdPolicy;

        return new Role(
            array(
                'id' => $role->id,
                'identifier' => $role->identifier,
            ),
            $existingPolicies
        );
    }

    /**
     * Removes a policy from the role.
     *
     * @deprecated since 5.3, use {@link removePolicyByRoleDraft()} instead.
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\UnauthorizedException if the authenticated user is not allowed to remove a policy
     * @throws \eZ\Publish\API\Repository\Exceptions\InvalidArgumentException if policy does not belong to the given role
     *
     * @param \eZ\Publish\API\Repository\Values\User\Role $role
     * @param \eZ\Publish\API\Repository\Values\User\Policy $policy the policy to remove from the role
     *
     * @return \eZ\Publish\API\Repository\Values\User\Role the updated role
     */
    public function removePolicy(APIRole $role, APIPolicy $policy)
    {
        $values = $this->requestParser->parse('role', $role->id);
        $response = $this->client->request(
            'DELETE',
            $this->requestParser->generate(
                'policy',
                array(
                    'role' => $values['role'],
                    'policy' => $policy->id,
                )
            ),
            new Message(
                // @todo: What media-type should we set here? Actually, it should be
                // all expected exceptions + none? Or is "Section" correct,
                // since this is what is to be expected by the resource
                // identified by the URL?
                array('Accept' => $this->outputVisitor->getMediaType('Policy'))
            )
        );

        if (!empty($response->body)) {
            $this->inputDispatcher->parse($response);
        }

        return $this->loadRole($role->id);
    }

    /**
     * Deletes a policy.
     *
     * @deprecated since 6.0, use {@link removePolicyByRoleDraft()} instead.
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\UnauthorizedException if the authenticated user is not allowed to remove a policy
     *
     * @param \eZ\Publish\API\Repository\Values\User\Policy $policy the policy to delete
     */
    public function deletePolicy(APIPolicy $policy)
    {
        throw new \Exception('@todo: Implement.');
    }

    /**
     * Updates the limitations of a policy. The module and function cannot be changed and
     * the limitations are replaced by the ones in $roleUpdateStruct.
     *
     * @deprecated since 6.0, use {@link updatePolicyByRoleDraft()} instead.
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\UnauthorizedException if the authenticated user is not allowed to update a policy
     * @throws \eZ\Publish\API\Repository\Exceptions\InvalidArgumentException if limitation of the same type is repeated in policy update
     *                                                                        struct or if limitation is not allowed on module/function
     * @throws \eZ\Publish\API\Repository\Exceptions\LimitationValidationException if a limitation in the $policyUpdateStruct is not valid
     *
     * @param \eZ\Publish\API\Repository\Values\User\PolicyUpdateStruct $policyUpdateStruct
     * @param \eZ\Publish\API\Repository\Values\User\Policy $policy
     *
     * @return \eZ\Publish\API\Repository\Values\User\Policy
     */
    public function updatePolicy(APIPolicy $policy, APIPolicyUpdateStruct $policyUpdateStruct)
    {
        $values = $this->requestParser->parse('role', $policy->roleId);
        $inputMessage = $this->outputVisitor->visit($policyUpdateStruct);
        $inputMessage->headers['Accept'] = $this->outputVisitor->getMediaType('Policy');
        $inputMessage->headers['X-HTTP-Method-Override'] = 'PATCH';

        $result = $this->client->request(
            'POST',
            $this->requestParser->generate(
                'policy',
                array(
                    'role' => $values['role'],
                    'policy' => $policy->id,
                )
            ),
            $inputMessage
        );

        return $this->inputDispatcher->parse($result);
    }

    /**
     * Loads a role for the given id.
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\UnauthorizedException if the authenticated user is not allowed to read this role
     * @throws \eZ\Publish\API\Repository\Exceptions\NotFoundException if a role with the given name was not found
     *
     * @param mixed $id
     *
     * @return \eZ\Publish\API\Repository\Values\User\Role
     */
    public function loadRole($id)
    {
        $response = $this->client->request(
            'GET',
            $id,
            new Message(
                array('Accept' => $this->outputVisitor->getMediaType('Role'))
            )
        );

        $loadedRole = $this->inputDispatcher->parse($response);
        $loadedRoleValues = $this->requestParser->parse('role', $loadedRole->id);
        $response = $this->client->request(
            'GET',
            $this->requestParser->generate('policies', array('role' => $loadedRoleValues['role'])),
            new Message(
                array('Accept' => $this->outputVisitor->getMediaType('PolicyList'))
            )
        );

        $policies = $this->inputDispatcher->parse($response);

        return new Role(
            array(
                'id' => $loadedRole->id,
                'identifier' => $loadedRole->identifier,
            ),
            $policies
        );
    }

    /**
     * Loads a role for the given name.
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\UnauthorizedException if the authenticated user is not allowed to read this role
     * @throws \eZ\Publish\API\Repository\Exceptions\NotFoundException if a role with the given name was not found
     *
     * @param string $name
     *
     * @return \eZ\Publish\API\Repository\Values\User\Role
     */
    public function loadRoleByIdentifier($name)
    {
        $response = $this->client->request(
            'GET',
            $this->requestParser->generate('roleByIdentifier', array('role' => $name)),
            new Message(
                array('Accept' => $this->outputVisitor->getMediaType('RoleList'))
            )
        );

        $result = $this->inputDispatcher->parse($response);

        return reset($result);
    }

    /**
     * Loads all roles.
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\UnauthorizedException if the authenticated user is not allowed to read the roles
     *
     * @return \eZ\Publish\API\Repository\Values\User\Role[]
     */
    public function loadRoles()
    {
        $response = $this->client->request(
            'GET',
            $this->requestParser->generate('roles'),
            new Message(
                array('Accept' => $this->outputVisitor->getMediaType('RoleList'))
            )
        );

        return $this->inputDispatcher->parse($response);
    }

    /**
     * Deletes the given role.
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\UnauthorizedException if the authenticated user is not allowed to delete this role
     *
     * @param \eZ\Publish\API\Repository\Values\User\Role $role
     */
    public function deleteRole(APIRole $role)
    {
        $response = $this->client->request(
            'DELETE',
            $role->id,
            new Message(
                // @todo: What media-type should we set here? Actually, it should be
                // all expected exceptions + none? Or is "Section" correct,
                // since this is what is to be expected by the resource
                // identified by the URL?
                array('Accept' => $this->outputVisitor->getMediaType('Role'))
            )
        );

        if (!empty($response->body)) {
            $this->inputDispatcher->parse($response);
        }
    }

    /**
     * Loads all policies from roles which are assigned to a user or to user groups to which the user belongs.
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\NotFoundException if a user with the given id was not found
     *
     * @param mixed $userId
     *
     * @return \eZ\Publish\API\Repository\Values\User\Policy[]
     */
    public function loadPoliciesByUserId($userId)
    {
        $values = $this->requestParser->parse('user', $userId);
        $response = $this->client->request(
            'GET',
            $this->requestParser->generate('userPolicies', array('user' => $values['user'])),
            new Message(
                array('Accept' => $this->outputVisitor->getMediaType('PolicyList'))
            )
        );

        return $this->inputDispatcher->parse($response);
    }

    /**
     * Assigns a role to the given user group.
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\UnauthorizedException if the authenticated user is not allowed to assign a role
     * @throws \eZ\Publish\API\Repository\Exceptions\LimitationValidationException if $roleLimitation is not valid
     *
     * @param \eZ\Publish\API\Repository\Values\User\Role $role
     * @param \eZ\Publish\API\Repository\Values\User\UserGroup $userGroup
     * @param \eZ\Publish\API\Repository\Values\User\Limitation\RoleLimitation $roleLimitation an optional role limitation (which is either a subtree limitation or section limitation)
     */
    public function assignRoleToUserGroup(APIRole $role, UserGroup $userGroup, RoleLimitation $roleLimitation = null)
    {
        $roleAssignment = new RoleAssignment(
            array(
                'role' => $role,
                'limitation' => $roleLimitation,
            )
        );

        $inputMessage = $this->outputVisitor->visit($roleAssignment);
        $inputMessage->headers['Accept'] = $this->outputVisitor->getMediaType('RoleAssignmentList');

        $result = $this->client->request(
            'POST',
            $this->requestParser->generate('groupRoleAssignments', array('group' => $userGroup->id)),
            $inputMessage
        );

        $this->inputDispatcher->parse($result);
    }

    /**
     * removes a role from the given user group.
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\UnauthorizedException if the authenticated user is not allowed to remove a role
     * @throws \eZ\Publish\API\Repository\Exceptions\InvalidArgumentException  If the role is not assigned to the given user group
     *
     * @param \eZ\Publish\API\Repository\Values\User\Role $role
     * @param \eZ\Publish\API\Repository\Values\User\UserGroup $userGroup
     */
    public function unassignRoleFromUserGroup(APIRole $role, UserGroup $userGroup)
    {
        $values = $this->requestParser->parse('group', $userGroup->id);
        $userGroupId = $values['group'];

        $values = $this->requestParser->parse('role', $role->id);
        $roleId = $values['role'];

        $response = $this->client->request(
            'DELETE',
            $this->requestParser->generate('groupRoleAssignment', array('group' => $userGroupId, 'role' => $roleId)),
            new Message(
                // @todo: What media-type should we set here? Actually, it should be
                // all expected exceptions + none? Or is "Section" correct,
                // since this is what is to be expected by the resource
                // identified by the URL?
                array('Accept' => $this->outputVisitor->getMediaType('RoleAssignmentList'))
            )
        );

        if (!empty($response->body)) {
            $this->inputDispatcher->parse($response);
        }
    }

    /**
     * Assigns a role to the given user.
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\UnauthorizedException if the authenticated user is not allowed to assign a role
     * @throws \eZ\Publish\API\Repository\Exceptions\LimitationValidationException if $roleLimitation is not valid
     *
     * @todo add limitations
     *
     * @param \eZ\Publish\API\Repository\Values\User\Role $role
     * @param \eZ\Publish\API\Repository\Values\User\User $user
     * @param \eZ\Publish\API\Repository\Values\User\Limitation\RoleLimitation $roleLimitation an optional role limitation (which is either a subtree limitation or section limitation)
     */
    public function assignRoleToUser(APIRole $role, User $user, RoleLimitation $roleLimitation = null)
    {
        $roleAssignment = new RoleAssignment(
            array(
                'role' => $role,
                'limitation' => $roleLimitation,
            )
        );

        $inputMessage = $this->outputVisitor->visit($roleAssignment);
        $inputMessage->headers['Accept'] = $this->outputVisitor->getMediaType('RoleAssignmentList');

        $result = $this->client->request(
            'POST',
            $this->requestParser->generate('userRoleAssignments', array('user' => $user->id)),
            $inputMessage
        );

        $this->inputDispatcher->parse($result);
    }

    /**
     * removes a role from the given user.
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\UnauthorizedException if the authenticated user is not allowed to remove a role
     * @throws \eZ\Publish\API\Repository\Exceptions\InvalidArgumentException If the role is not assigned to the user
     *
     * @param \eZ\Publish\API\Repository\Values\User\Role $role
     * @param \eZ\Publish\API\Repository\Values\User\User $user
     */
    public function unassignRoleFromUser(APIRole $role, User $user)
    {
        $values = $this->requestParser->parse('user', $user->id);
        $userId = $values['user'];

        $values = $this->requestParser->parse('role', $role->id);
        $roleId = $values['role'];

        $response = $this->client->request(
            'DELETE',
            $this->requestParser->generate('userRoleAssignment', array('user' => $userId, 'role' => $roleId)),
            new Message(
                // @todo: What media-type should we set here? Actually, it should be
                // all expected exceptions + none? Or is "Section" correct,
                // since this is what is to be expected by the resource
                // identified by the URL?
                array('Accept' => $this->outputVisitor->getMediaType('RoleAssignmentList'))
            )
        );

        if (!empty($response->body)) {
            $this->inputDispatcher->parse($response);
        }
    }

    /**
     * Removes the given role assignment.
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\UnauthorizedException if the authenticated user is not allowed to remove a role assignment
     *
     * @param \eZ\Publish\API\Repository\Values\User\RoleAssignment $roleAssignment
     */
    public function removeRoleAssignment(APIRoleAssignment $roleAssignment)
    {
        throw new \Exception('@todo: Implement.');
    }

    /**
     * Loads a user assignment for the given id.
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\UnauthorizedException if the authenticated user is not allowed to read this role
     * @throws \eZ\Publish\API\Repository\Exceptions\NotFoundException If the role assignment was not found
     *
     * @param mixed $roleAssignmentId
     *
     * @return \eZ\Publish\API\Repository\Values\User\RoleAssignment
     */
    public function loadRoleAssignment($roleAssignmentId)
    {
        throw new \Exception('@todo: Implement.');
    }

    /**
     * Returns the assigned user and user groups to this role.
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\UnauthorizedException if the authenticated user is not allowed to read a role
     *
     * @param \eZ\Publish\API\Repository\Values\User\Role $role
     *
     * @return \eZ\Publish\API\Repository\Values\User\RoleAssignment[]
     */
    public function getRoleAssignments(APIRole $role)
    {
        throw new \Exception('@todo: Implement.');
    }

    /**
     * @see \eZ\Publish\API\Repository\RoleService::getRoleAssignmentsForUser()
     */
    public function getRoleAssignmentsForUser(User $user, $inherited = false)
    {
        $response = $this->client->request(
            'GET',
            $this->requestParser->generate('userRoleAssignments'),
            new Message(
                array('Accept' => $this->outputVisitor->getMediaType('RoleAssignmentList'))
            )
        );

        $roleAssignments = $this->inputDispatcher->parse($response);

        $userRoleAssignments = array();
        foreach ($roleAssignments as $roleAssignment) {
            $userRoleAssignments[] = new UserRoleAssignment(
                array(
                    'limitation' => $roleAssignment->getRoleLimitation(),
                    'role' => $roleAssignment->getRole(),
                    'user' => $user,
                )
            );
        }

        return $userRoleAssignments;
    }

    /**
     * Returns the roles assigned to the given user group.
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\UnauthorizedException if the authenticated user is not allowed to read a user group
     *
     * @param \eZ\Publish\API\Repository\Values\User\UserGroup $userGroup
     *
     * @return \eZ\Publish\API\Repository\Values\User\UserGroupRoleAssignment[]
     */
    public function getRoleAssignmentsForUserGroup(UserGroup $userGroup)
    {
        $response = $this->client->request(
            'GET',
            $this->requestParser->generate('groupRoleAssignments'),
            new Message(
                array('Accept' => $this->outputVisitor->getMediaType('RoleAssignmentList'))
            )
        );

        $roleAssignments = $this->inputDispatcher->parse($response);

        $userGroupRoleAssignments = array();
        foreach ($roleAssignments as $roleAssignment) {
            $userGroupRoleAssignments[] = new UserGroupRoleAssignment(
                array(
                    'limitation' => $roleAssignment->getRoleLimitation(),
                    'role' => $roleAssignment->getRole(),
                    'userGroup' => $userGroup,
                )
            );
        }

        return $userGroupRoleAssignments;
    }

    /**
     * Instantiates a role create class.
     *
     * @param string $name
     *
     * @return \eZ\Publish\API\Repository\Values\User\RoleCreateStruct
     */
    public function newRoleCreateStruct($name)
    {
        return new Values\User\RoleCreateStruct($name);
    }

    /**
     * Instantiates a policy create class.
     *
     * @param string $module
     * @param string $function
     *
     * @return \eZ\Publish\API\Repository\Values\User\PolicyCreateStruct
     */
    public function newPolicyCreateStruct($module, $function)
    {
        return new PolicyCreateStruct($module, $function);
    }

    /**
     * Instantiates a policy update class.
     *
     * @return \eZ\Publish\API\Repository\Values\User\PolicyUpdateStruct
     */
    public function newPolicyUpdateStruct()
    {
        return new PolicyUpdateStruct();
    }

    /**
     * Instantiates a policy update class.
     *
     * @return \eZ\Publish\API\Repository\Values\User\RoleUpdateStruct
     */
    public function newRoleUpdateStruct()
    {
        return new RoleUpdateStruct();
    }

    /**
     * Returns the LimitationType registered with the given identifier.
     *
     * @param string $identifier
     *
     * @return \eZ\Publish\SPI\Limitation\Type
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\NotFoundException if there is no LimitationType with $identifier
     */
    public function getLimitationType($identifier)
    {
        throw new \eZ\Publish\API\Repository\Exceptions\NotImplementedException(__METHOD__);
    }

    /**
     * Returns the LimitationType's assigned to a given module/function.
     *
     * Typically used for:
     *  - Internal validation limitation value use on Policies
     *  - Role admin gui for editing policy limitations incl list limitation options via valueSchema()
     *
     * @param string $module Legacy name of "controller", it's a unique identifier like "content"
     * @param string $function Legacy name of a controller "action", it's a unique within the controller like "read"
     *
     * @return \eZ\Publish\SPI\Limitation\Type[]
     *
     * @throws \eZ\Publish\API\Repository\Exceptions\BadStateException If module/function to limitation type mapping
     *                                                                 refers to a non existing identifier.
     */
    public function getLimitationTypesByModuleFunction($module, $function)
    {
        throw new \eZ\Publish\API\Repository\Exceptions\NotImplementedException(__METHOD__);
    }
}
