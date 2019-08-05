<?php

require_once VF_SYSTEM_DIR . 'engine/resolver.php';

use \Magento\Framework\App\ObjectManager;

class ResolverBlogReview extends Resolver
{
    public function add($args)
    {
        $objectManager = ObjectManager::getInstance();
        $commentFactory = $objectManager->get('Magefan\Blog\Model\CommentFactory');
        $customerSession = $objectManager->get('\Magento\Customer\Model\Session');
        /** @var Magefan\Blog\Model\Comment $comment */
        $comment = $commentFactory->create();

        $comment->setData(array(
            'post_id' => $args['id'],
            'author_nickname' => $args['author'],
            'author_email' => '',
            'text' => $args['content']
        ));

        $comment->setStatus(
            $this->getConfigValue(
                \Magefan\Blog\Helper\Config::COMMENT_STATUS
            )
        );

        if ($customerSession->getCustomerGroupId()) {
            /* Customer */
            $comment->setCustomerId(
                $customerSession->getCustomerId()
            )->setAuthorNickname(
                $customerSession->getCustomer()->getName()
            )->setAuthorEmail(
                $customerSession->getCustomer()->getEmail()
            )->setAuthorType(
                \Magefan\Blog\Model\Config\Source\AuthorType::CUSTOMER
            );
        } elseif ($this->getConfigValue(
            \Magefan\Blog\Helper\Config::GUEST_COMMENT
        )) {
            $comment->setCustomerId(0)->setAuthorType(
                \Magefan\Blog\Model\Config\Source\AuthorType::GUEST
            );
        } else {
            throw new Exception('Login to submit comment');
        }

        $comment->save();

        return $this->load->resolver('blog/post/get', $args);
    }

    public function get($data)
    {
        /** @var $post Magefan\Blog\Model\Post */
        $post = $data['post'];
        /** @var Magefan\Blog\Model\ResourceModel\Comment\Collection $collection */
        $collection = $post->getComments();

        $comments = array();
        /** @var Magefan\Blog\Model\Comment $comment */
        foreach ($collection->getItems() as $comment) {
            $comments[] = array(
                'author' => $comment->getAuthorNickname(),
                'author_email' => $comment->getAuthorEmail(),
                'created_at' => $comment->getPublishDate(),
                'content' => $comment->getText(),
                'rating' => null
            );
        }

        return array(
            'content' => $comments,
            'totalElements' => $post->getCommentsCount()
        );
    }

    public function getConfigValue($path)
    {
        $objectManager = ObjectManager::getInstance();
        /** @var \Magento\Framework\App\Config\ScopeConfigInterface $config */
        $config = $objectManager->get(\Magento\Framework\App\Config\ScopeConfigInterface::class);
        return $config->getValue(
            $path,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}
